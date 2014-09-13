<?php 

// Controller responsible for job queries.
class disabledJobController extends BaseController {

	const LATEST_JOBS = 10;

	// Serve the basic page showing jobs
	public function jobs() {

		$validator = Validator::make(Input::all(), array(
			'keyword' => 'required|min:3|alpha_dash'
		));


		if ($validator->fails()) {
			
			return View::make('jobs', array(
				'jobs' => DB::select("EXEC spJobSearch_Select ''"),
				'recommended' => self::getRecommendedJobs()
			));	
		}

		return View::make('jobs', array(
			// Keyword shouldn't be able to perform SQL injection, as ' and ; are not in the alpha_dash set.
			'jobs' => DB::select("EXEC spJobSearch_Select ?", array(Input::get('keyword'))),
			'recommended' => self::getRecommendedJobs()
		));
	}

	// get a listing of jobs by sector
	public function jobsBySector($sectorId) {
		$validator = Validator::make(
			array('id' => $sectorId),
			array('id' => 'required|numeric')
		);

		if ($validator->fails()) {
			return Redirect::to('jobs');
		}

		return View::make('jobs', array(
			// had a bit of a problem with this query, stored procedure doesn't like PHP autocasting
			'jobs' => DB::select("EXEC spJobSearch_Select @JobTitle ='', @SectorIDs = '$sectorId'"),
			'recommended' => self::getRecommendedJobs()
		));
	}

	// Get the currently recommended jobs.
	private static function getRecommendedJobs() {
		$recommended = self::getLatestJobs();
		shuffle($recommended);
		// only show 3 of the shuffled list
		return array($recommended[0], $recommended[1], $recommended[2]);
	}
		
	// Acquire listings for latest jobs. 
	public static function getLatestJobs() {
		return DB::select("EXEC spJobsLatest_Select ?", array(self::LATEST_JOBS));
	}
}
