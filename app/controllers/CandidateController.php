<?php

class CandidateController extends BaseController {
	
	public function candidates()
	{
		$candidates = Candidate::all();
		return View::make('admin.candidates.view')->withCandidates($candidates);
	}

	/**
	* Candidate FrontPage Route
	**/
	public function candidatesFrontPage(){
		if( is_null( Session::get('candidate') ) ){
	        return Redirect::to('become-a-candidate')->with('info', 'Please login / register to view this page');
	    }

		$output = array();
		$output['latest'] = JobController::getLatestJobs();

		$candidate = Candidate::find(Session::get('candidate')->id);
		$testimonial = Content::where('type','testimonial')->where('client_facing',1)->get()->random(1);

		return View::make('candidate.profile',  $output)->with(compact('candidate'))->with(compact('testimonial'));
	}

	/**
	 * Show a candidate's details on the admin dashboard.
	 * 
	 * @return Response
	 */
	public function view()
	{
		$id = Request::segment(4);
		$c = Candidate::find($id);
		if(!$c)
		{
			$messageBag = new Illuminate\Support\MessageBag;
			$messageBag->add('error', 'Candidate not found or missing id');
			return Redirect::to('dashboard/candidates')->withErrors($messageBag);
		}

		return View::make('admin.candidates.profile')->withCandidate($c);
	}

	public function edit()
	{
		$id = Request::segment(4);
		$candidate = Candidate::find($id);
        return View::make('admin.candidates.edit')->with(compact('candidate'));
	}

	public function edit_post()
	{
		$id = Request::segment(4);
		$c = Candidate::find($id);

		$name = explode(' ', Input::get('name'));


		$c->name = $name[0];
		if (count($name)>1) {
			$c->surname = $name[1];
		}	
		else {
			$c->surname = "";
		}
		$c->email = Input::get('email');
		$c->current_position = Input::get('current_position');
		$c->phone = Input::get('phone');
		$c->save();

		return Redirect::back();
	}

	public function activity()
	{
		$id = Request::segment(4);
		$candidate = Candidate::find($id);
        $jobs = SavedJob::where('candidate_id', $id)->get();
        return View::make('admin.candidates.activity')->with(compact('candidate'))->with(compact('jobs'));
	}

	public function alert()
	{
		$id = Request::segment(4);
		$candidate = Candidate::find($id);
        $jobAlert = JobAlerts::where('candidate_id', $candidate->id)->first();
        return View::make('admin.candidates.alert')->with(compact('candidate'))->with(compact('jobAlert'));
	}

	public function feedback()
	{
		$id = Request::segment(4);
		$candidate = Candidate::find($id);
        $feedback = JobFeedback::where('candidate_id', $id)->get();
        return View::make('admin.candidates.feedback')->with(compact('candidate'))->with(compact('feedback'));
	}

	public function feedback_add()
	{
		$id = Request::segment(4);
		$candidate = Candidate::find($id);
		return View::make('admin.candidates.feedback_add')->with(compact('candidate'));
	}

	public function feedback_add_post()
	{
		$id = Request::segment(4);
		$candidate = Candidate::find(Session::get('candidate')->id);

		$feedback = new JobFeedback;
		$feedback->candidate_id = $candidate->id;
		$feedback->job_reference = Input::get('job_reference');
		$feedback->feedback = Input::get('feedback');
		$feedback->save();

		return Redirect::to('dashboard/candidates/view/'.$candidate->id.'/feedback');
	}

	// Handle a request to register as a new candidate.
	public function saveCandidate()
	{
		$validator = Validator::make(Input::all(), array(
			'name' => 'required',
			'email' => 'required|email',
			// 'current_position'=> 'required',
			// 'phone' => 'required',
			// 'password' => 'required|confirmed'
			)
		);
		// check for the required fields before doing anything else
		if ($validator->fails()) {
			return Redirect::back()->withInput()->withErrors($validator->messages());
		}

		// Check to see if we already have a candidate at this email address. There can be only one
		$email = Input::get('email');
		
		$existingCandidates = Candidate::where('email', '=', $email)->first();

		if ($existingCandidates) {
			$messageBag = new Illuminate\Support\MessageBag;
			$messageBag->add('error', "You have already registered as a candidate, please log in.");
			return Redirect::back()->withErrors($messageBag);
		}

		$c = new Candidate;

		$name = explode(' ', Input::get('name'));

		$name = $name[0];

		// Prep client data for save
		$c->email = Input::get('email');
		$c->name = $name;
		$c->surname = $name[1];
		$c->password = Hash::make(Input::get('password'));
		$c->current_position = Input::get('current_position');
		$c->phone = Input::get('phone');
		$c->sendjobs = Input::get('sendjobs',0);

		if(Input::hasFile('cv'))
		{
			$newfilename = Str::slug($name).'_cv_'.uniqid().'.'.Input::file('cv')->getClientOriginalExtension();
			Input::file('cv')->move(public_path().'/uploads/cvs/',$newfilename);
			$c->cv = $newfilename;

			// Send email to KDC
			Candidate::sendBecomeCandidate(Input::all(), $newfilename);
		}
		else
		{
			// Send email to KDC
			Candidate::sendBecomeCandidate(Input::all(), '');
		}

		$c->save();

		// Send activation email
		Candidate::sendActivation($c->id);

		// Add the candidate to the session - using this rather than full on auth as that's already being used by admins to access the CMS (dashboard)
		// Session::put('candidate', $c);
		// Just take them to the front page again for now.
		return Redirect::to('/')->with('info', 'Thank you for your registration – we’ll send you your login details as soon as we can.');
	}

	public function loginCandidate() {

		// return Redirect::to('')->withInfo('Your details weren’t accepted – please register for access to a candidate portal');

		$validator = Validator::make(Input::all(), 
			array(
				'email' => 'required|email',
				'password' => 'required'
			)
		);
		if ($validator->fails()) {
			return Redirect::back()->withErrors($validator->messages());
		}

		$email = Input::get('email');
		$password = Input::get('password');

		
		if($candidate = Candidate::where('email', '=', $email)->first())
		{
			if(Hash::check($password, $candidate->password))
			{
				if($candidate->active == 1)
				{
					$candidate->last_login = new Datetime;
					$candidate->save();
					Session::put('candidate', $candidate);

					// take them back to the page they just logged in from, now with a session to their name
					return Redirect::to('candidate');
				}
				else
				{
					Candidate::sendActivation($candidate->id);

					return Redirect::back()->withInfo('You must activate your account before logging in. We have resent the email for your convenience.');					
				}
			}
		}
										
		$messageBag = new Illuminate\Support\MessageBag;
		$messageBag->add('candidateLogin', "The username and password did not match");
		return Redirect::back()->withErrors($messageBag);		
		
	}

	public function activate($candidate_id, $activation_code)
	{
		$candidate = Candidate::where('id', $candidate_id)->where('activation_code',$activation_code)->first();

		if(!is_null($candidate))
		{
			$candidate->active = 1;
			$candidate->activation_code = null;
			$candidate->save();

			return Redirect::to('/')->withInfo('Your account has now been activated. You can now login.');
		}

		return Redirect::to('/')->withInfo('There was an error.');
		
	}

	public function forgotPassword()
	{
		return View::make('candidate.forgot');
	}
	
	public function resetGet($candidate_id, $password_reset_code)
	{
		return View::make('candidate.reset_password');
	}
	public function sendReset()
	{
		$validator = Validator::make(Input::all(), array(
			'email' => 'required|email',
			)
		);
		
		// check for the required fields before doing anything else
		if ($validator->fails()) {
			return Redirect::back()->withInput()->withErrors($validator->messages());
		}
		
		$email = Input::Get('email');
		$candidate = Candidate::where('email', $email)->first();

		if(!is_null($candidate))
		{
			Candidate::sendReset($candidate->id);
			return Redirect::to('/')->withInfo('A password reset email has been sent to the email associated with your account.');
		}
		else
		{
			return Redirect::to('/')->withInfo('No candidate with that email address.');
		}

		return Redirect::to('/')->withInfo('There was an error.');
	}

	public function reset($candidate_id, $password_reset_code)
	{
		$validator = Validator::make(Input::all(), array(
			'passsword'              => 'required|min:5',
			'passsword_confirmation' => 'required|same:password',
			)
		);
		
		// check for the required fields before doing anything else
		if ($validator->fails()) {
			return Redirect::route('candidate-reset')->with('canditdate_id', $candidate_id, 'password_reset_code', $password_reset_code)->withErrors($validator->messages());
		}
		
		$candidate = Candidate::where('id', $candidate_id)->where('password_reset_code', $password_reset_code)->first();

		if(!is_null($candidate))
		{
			return View::make('candidate.reset_password');
		}
		else
		{	// Candidate not found or password reset code was not valid
			return View::make('candidate.reset_password')->withInfo('Invalid password reset link');
		}
		// All else fails, heres a safety net
		return Redirect::to('/')->withInfo('There was an error.');
	}

	public function resetPassword($candidate_id, $password_reset_code)
	{
		$candidate = Candidate::where('id', $candidate_id)->where('password_reset_code',$password_reset_code)->first();

		if(!is_null($candidate))
		{
			$password = Input::get('password');
			$candidate->password = Hash::make($password);
			$candidate->save();

			return Redirect::to('/')->withInfo('Your password has now been reset.');
		}

		return Redirect::to('/')->withInfo('There was an error.');
	}

	public function cvUpload()
	{
		dd(Input::all());
		if (Input::hasFile('filesToUpload'))
		{
			$file = Input::file('cv');
			$destinationPath = 'uploads/cvs/';
			$extension =$file->getClientOriginalExtension(); 
			$filename = str_random(12).'.'.$extension;
			//$filename = $file->getClientOriginalName();
			// $file->getRealPath();
			$upload_success = Input::file('cv')->move($destinationPath, $filename);
			
			$candidate = Candidate::find(Session::get('candidate')->id);
			

			if( $upload_success ) {

				$candidate->cv = $destinationPath.$filename;
				$candidate->save();

				return Redirect::back()->withInfo('Your CV has been uploaded');
			}
			else {
		   return Redirect::back()->withInfo('There was an error');
		}
		}
		else {
		   return Redirect::back()->withInfo('There was an error');
		}
	}


	public function careerResources()
	{
		$covering_letter = Content::where('type','career_resource')->where('subtype','covering_letter')->first();
		$how_to_write_a_cv = Content::where('type','career_resource')->where('subtype','how_to_write_a_cv')->first();
		$interview_tips = Content::where('type','career_resource')->where('subtype','interview_tips')->first();
		$career_management = Content::where('type','career_resource')->where('subtype','career_management')->first();
		$news = Content::where('type','news')->where('subtype','job')->limit(6)->get();
		return View::make('career-resource')->withCovering($covering_letter)->withCv($how_to_write_a_cv)->withInterview($interview_tips)->withNews($news)->withCareer($career_management);
	}

	public function getJobApplications()
	{
    	if(!is_null(Session::get('candidate')))
	    {
	        $candidate = Candidate::find(Session::get('candidate')->id);
	        
	        $jobs = SavedJob::where('candidate_id', Session::get('candidate')->id)
	        ->where('applied', null)
	        ->get();
	        
	        return View::make('candidate.applications')
	        ->with(compact('candidate'))
	        ->with(compact('jobs'));
	    }
    	else
    	{
        	return Redirect::to('become-a-candidate')->with('info', 'Please login / register to view this page');
    	}
	}

	public function savedJobs() 
	{
		$candidate = Session::get('candidate');
		$jobs      = SavedJob::where('candidate_id', '=', $candidate->id)->get();

		return View::make('candidate.savedjobs')
		->with('candidate', $candidate)
		->with('jobs', $jobs);
	}

	public function jobAlerts()
	{
    	if(!is_null(Session::get('candidate')))
    {
        $candidate = Candidate::find(Session::get('candidate')->id);
        $sectors   = JobAlerts::getJobSectors();
        $job_types = JobAlerts::getJobTypes();
        $locations = JobAlerts::getJobLocations();
        
        // Check if there is an alert already
        $jobAlert  = JobAlerts::where('candidate_id', $candidate->id)->first();
        if(!is_null($jobAlert))
        {
            $alert = $jobAlert;

            // Now we have an alert let check for relevant jobs
            $jobs  = DB::select("EXEC spJobSearch_Select @JobTitle = '', @LocationIDs = '$alert->location_id', @SectorIDs = '$alert->sector_id', @EmploymentTypeIDs = '$alert->job_type'");
        }
        else
        {
            $alert = [];
            $jobs = [];
        }

        $viewSectors = $viewlocations = [];

        foreach ($sectors as $sector) {
        	$viewSectors[$sector->SectorId] = $sector->SectorName;
        }

        foreach ($locations as $location) {
        	$viewlocations[$location->LocationId] = $location->Description;
        }

        return View::make('candidate.jobalerts', [
        				'candidate' => $candidate,
        				'sectors' => $viewSectors,
        				'job_types' => $job_types,
        				'locations' => $viewlocations,
		        		'alert' => $alert,
		        		'jobs' => $jobs
        			]);
    }
    else
    {
        return Redirect::to('become-a-candidate')->with('info', 'Please login / register to view this page');
    }
    
	}

	public function jobAlertsPost()
	{
    	// dd(Input::all());
	    if(!is_null(Session::get('candidate')))
    {
        $candidate = Candidate::find(Session::get('candidate')->id);
        $input = Input::all();

        // Check if there is an alert already
        $jobAlert = JobAlerts::where('candidate_id', $candidate->id)->first();
        if(is_null($jobAlert))
        {
            $alert = new JobAlerts;
        }
        else
        {
            $alert = $jobAlert;
        }

        if(isset($input['active']))
        {
            $active = 1;
        }
        else
        {
            $active = 0;
        }

        $alert->candidate_id = $candidate->id;
        $alert->job_type = $input['job_type_id'];
        $alert->sector_id = $input['sector_id'];
        $alert->location_id = $input['location_id'];
        $alert->salary_expectations = $input['salary'];
        $alert->keywords = $input['job_keywords'];
        $alert->skill_keywords = $input['skill_keywords'];
        $alert->active = $active;
        $alert->save();

        return Redirect::back()->withInfo('Your alert settings have been saved');
    }
    else
    {
        return Redirect::to('become-a-candidate')->with('info', 'Please login / register to view this page');
    }
    
	}

}
