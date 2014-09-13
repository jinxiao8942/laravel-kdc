<?php 

// Controller responsible for job queries.
class JobController extends BaseController {

	const LATEST_JOBS = 10;

	public function postJobs()
	{
		// Check form filled correctly
		$validator = Validator::make(Input::all(), array(
			'keyword' => 'required|min:3|alpha_dash'
		));
		
		// Check for posted search items 
		if(isset($_GET['sector']) || isset($_GET['job_type']) || isset($_GET['location']))
		{
			if(isset($_GET['sector'])){$sectors_get = implode(', ',$_GET['sector']);}else{$sectors_get = NULL;};
			if(isset($_GET['job_type'])){$type_get = implode(', ',$_GET['job_type']);}else{$type_get = NULL;};
			if(isset($_GET['location'])){$location_get = implode(', ',$_GET['location']);}else{$location_get = NULL;};
			
			if(Input::get('keyword'))
			{
				$keywords = Input::get('keyword');
			}
			else 
			{
				$keywords = '';
			}
			
			// Set page title based on keyword
			$displayTitle = 'Search Term: '.Input::get('keyword');
			$sectors = DB::select("EXEC spSectors_Select");
	        $job_types = JobAlerts::getJobTypes();
	        $locations = DB::select("EXEC spLocations_Select");

	        $numOfJobs = 5;
			$pageNumber = (Input::get('page') ?: 1);
			$jobs = [];
			$paginator = Paginator::make($jobs, count(DB::select("EXEC spJobSearch_Select @JobTitle = '', @SectorIDs = '$sectors_get', @LocationIDs = '$location_get', @EmploymentTypeIDs = '$type_get'")), $numOfJobs);
			
			$jobs = DB::select("EXEC spJobSearchPaged_Select @JobTitle = ?, @SectorIDs = '$sectors_get', @LocationIDs = '$location_get', @EmploymentTypeIDs = '$type_get', @RowsPerPage = $numOfJobs, @PageNumber = $pageNumber", explode('+', $keywords));
			$recommended = self::getRecommendedJobs();
		}
			// Done setting up the pre-defined data, lets load the view and push that data in
			return View::make('jobs')
			->with('jobs', $jobs)
			->with('reccommended', $reccommended)
			->with('sectors', $sectors)
			->with('job_types', $job_types)
			->with('locations', $locations)
			->with('displayTitle', $displayTitle)
			->with('paginator', $paginator);
	}
	
	// Serve the basic page showing jobs
	public function getJobs() 
	{
		$displayTitle = "Jobs";//.$sectorId;
		$sectors = DB::select("EXEC spSectors_Select");
		dd($sectors);
        $job_types = JobAlerts::getJobTypes();
        $locations = DB::select("EXEC spLocations_Select");

        $numOfJobs = 5;
		$pageNumber = (Input::get('page') ?: 1);
		$jobs = [];
		$paginator = Paginator::make($jobs, count(DB::select("EXEC spJobSearch_Select @JobTitle = '', @SectorIDs = '$sectors_get', @LocationIDs = '$location_get', @EmploymentTypeIDs = '$type_get'")), $numOfJobs);
		
		$jobs = DB::select("EXEC spJobSearchPaged_Select @JobTitle = ?, @SectorIDs = '$sectors', @LocationIDs = '$location_get', @EmploymentTypeIDs = '$type_get', @RowsPerPage = $numOfJobs, @PageNumber = $pageNumber", explode('+', $keywords));
		$recommended = self::getRecommendedJobs();
		
		return View::make('jobs')
		->with('jobs', $jobs)
		->with('reccommended', $reccommended)
		->with('sectors', $sectors)
		->with('job_types', $job_types)
		->with('locations', $locations)
		->with('displayTitle', $displayTitle)
		->with('paginator', $paginator);
	}
	
	public function job($job)
	{
		$jobParts = explode('-', $job);
	    $job = DB::select("EXEC spJobByID_Select @JobID = $jobParts[0]")[0];
	    $latest = JobController::getLatestJobs();
	    $latest = array_slice($latest, 0, 3);
	    return View::make('job')->withJob($job)->withRecommended(self::getRecommendedJobs())->withLatest($latest);
	}

	public function apply($id)
	{
		$job = DB::select("EXEC spJobByID_Select @JobID = $id")[0];
	    $data = [];
		$data['job'] = $job;

		$data['form'] = Input::all();

		$email = Input::get('email');
		$name = Input::get('name');

		if(Input::hasFile('cv'))
		{
			$newfilename = Str::slug($name).'_cv_'.uniqid().'.'.Input::file('cv')->getClientOriginalExtension();
			Input::file('cv')->move(public_path().'/uploads/cvs/',$newfilename);
			
			Mail::send('emails.jobs.apply', $data, function($message) use($email, $name, $newfilename, $job)
			{
			    $message->to($email, $name)->subject('APPLICATION RECEIVED for '. $job->JobTitle . ' REF: '. $job->JobRefNo);
			    $message->bcc($job->OperatorEmail, $job->OperatorName . ' ' . $job->OperatorSurname)->subject('APPLICATION RECEIVED for '. $job->JobTitle . ' REF: '. $job->JobRefNo);

			    $message->attach(public_path().'/uploads/cvs/'.$newfilename);	
			});
		}
		else
		{
			// Send email to KDC
			Mail::send('emails.jobs.apply', $data, function($message) use($email, $name, $job)
			{
			    $message->to($email, $name)->subject('APPLICATION RECEIVED for '. $job->JobTitle . ' REF: '. $job->JobRefNo);
			    $message->bcc($job->OperatorEmail, $job->OperatorName . ' ' . $job->OperatorSurname)->subject('APPLICATION RECEIVED for '. $job->JobTitle . ' REF: '. $job->JobRefNo);
			    $message->bcc('it_support@kdc-group.co.uk','KDC')->subject('APPLICATION RECEIVED for '. $job->JobTitle . ' REF: '. $job->JobRefNo);
			});
		}


	    return Redirect::back()->withInfo('Your application has been sent');
	}

	public function share()
	{	
		$id = Input::get('id');
		$job = DB::select("EXEC spJobByID_Select @JobID = $id")[0];
		$data = [];
		$data = Input::all();
		$data['job'] = $job;
		// dd($data);
		$c1 = [
			'name' => Input::get('nameRefer'),
			'email' => Input::get('emailRefer')
		];
		Mail::send('emails.jobs.shareReferer', $data, function($message) use($c1, $job)
		{
		    $message->to($c1['email'], $c1['name'])->subject('KDC - Job Share Info');
		    $message->bcc($job->OperatorEmail, $job->OperatorName . ' ' . $job->OperatorSurname)->subject('KDC - Job Share');
		});


		$c2 = [
			'name' => Input::get('friendNameRefer'),
			'email' => Input::get('friendEmailRefer')
		];

		Mail::send('emails.jobs.shareFriend', $data, function($message) use($c2, $job)
		{
		    $message->bcc($c2['email'], $c2['name'])->subject('KDC - Job Share Info');
		    $message->bcc($job->OperatorEmail, $job->OperatorName . ' ' . $job->OperatorSurname)->subject('KDC - Job Share');
		});

		return Redirect::to('')->withInfo('Job has been shared.');
	}






	// get a listing of jobs by sector
	public function jobsBySector($sectorId) {
		$sectors = DB::select("EXEC spSectors_Select");
$title = '';
		foreach($sectors as $sector)
		{
			if($sector->SectorId == $sectorId)
			{
				$title = $sector->SectorName;
			}
		}

        $job_types = [];//JobAlerts::getJobTypes();
        $locations = [];//JobAlerts::getJobLocations();
        
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
			'recommended' => self::getRecommendedJobs(),
			'sectors' => $sectors,
			'job_types' => $job_types,
			'locations' => $locations,
			'displayTitle' => 'Sector: '.$title
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
