<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class JobAlertDispatcher extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'candidates:send-alerts';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Go through all candidates and send them a job alert.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	public function fire()
	{
        $sectors   = JobAlerts::getJobSectors();
        $jobTypes = JobAlerts::getJobTypes();
        $locations = JobAlerts::getJobLocations();

		// loop through all candidates
		Candidates::get()->each(function ($candidate) use ($sectors, $jobTypes, $locations) {
			$candidate->jobAlerts->each(function ($jobAlert) use ($sectors, $jobTypes, $locations) {
				// select all jobs, query derived from controller
				$jobs  = DB::select("
					EXEC spJobSearch_Select 
					@JobTitle = '', 
					@LocationIDs = '$jobAlert->location_id', 
					@SectorIDs = '$jobAlert->sector_id', 
					@EmploymentTypeIDs = '$jobAlert->job_type'");

				// dispatch mail
				Mail::send('candidate.jobalerts', [
					'sectors' => $sectors,
					'job_types' => $jobTypes,
					'locations' => $locations,
					'alert' => $jobAlert,
					'jobs' => $jobs
				], function ($message) use ($candidate) {
					$message->to($candidate->email, $candidate->name)
							->subject('Job Alerts from KDC');
				});
			});
		});
	}

}
