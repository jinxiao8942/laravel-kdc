<?php

Route::get('/', array('uses'=>'HomeController@homepage'));
Route::get('/about', array('uses'=>'HomeController@about'));
Route::get('/news', array('uses'=>'HomeController@news'));
Route::get('/news/{news}', array('uses'=>'HomeController@newsItem'));

Route::get('/become-a-candidate', array('uses'=>'HomeController@candidate'));
Route::post('/become-a-candidate', array('uses'=>'CandidateController@saveCandidate'));

Route::get('/jobs', array('uses'=>'JobController@getJobs'));
Route::post('/jobs', array('uses'=>'JobController@postJobs'));
Route::get('/jobs/{job}', array('uses' => 'JobController@getJob'));

Route::post('/jobs/{job}/apply', array('uses' => 'JobController@apply'));
Route::post('/jobs/share', array('uses' => 'JobController@share'));

Route::get('/sector/{id}', array('uses'=>'JobController@jobsBySector'));
Route::get('/contact-us', array('uses'=>'HomeController@contact'));
Route::post('/contact-us', array('uses'=>'HomeController@sendcontact'));

Route::get('legal', array('uses' => 'HomeController@legal'));

Route::get('/career-resources', array('uses' => 'CandidateController@careerResources'));

Route::get('admin', function() { return Redirect::to('dashboard'); });

Route::get('logout',array('as'=>'logout','uses'=>'CommonController@logout'));
Route::get('dashboard/login',array('as'=>'login','uses'=>'CommonController@login'));
Route::post('dashboard/login',array('uses'=>'CommonController@doLogin'));

Route::post('candidate/login',array('uses'=>'CandidateController@loginCandidate'));
Route::get('candidate/activate/{candidate_id}/{activation_code}', array('as'=>'candidate-activate', 'uses' => 'CandidateController@activate'));

Route::get('candidate/forgot', array('uses' => 'CandidateController@forgotPassword'));
Route::post('candidate/forgot', array('as'=>'candidate-forgot-post', 'uses' => 'CandidateController@sendReset'));

Route::get('candidate/reset/{candidate_id}/{password_reset_code}', array('uses' => 'CandidateController@reset'));
Route::get('candidate/reset/{candidate_id}/{password_reset_code}', array('as'=> 'candidate-reset', 'uses' => 'CandidateController@resetGet'));
Route::post('candidate/reset/{candidate_id}/{password_reset_code}', array('as'=> 'candidate-reset-post', 'uses' => 'CandidateController@reset'));

Route::get('candidate/saved-jobs', array('as'=>'candidate-saved-jobs','uses' => 'CandidateController@savedJobs'));

Route::get('login',array('as'=>'login','uses'=>'CommonController@login'));
Route::post('login',array('uses'=>'CommonController@doLogin'));

// Route::post('candidate/cv-upload', array('uses' => 'CandidateController@cvUpload'));

// Routes for the Client side of the site, currently all through the same controller as content is static
Route::get('client', array('uses'=>'ClientController@homepage'));
Route::get('client/about', array('uses'=>'ClientController@about'));
Route::get('client/become-a-client', array('uses'=>'ClientController@becomeClient'));
Route::post('client/become-a-client', array('uses'=>'ClientController@saveClient'));
Route::get('client/contact-us', array('uses'=>'ClientController@contactUs'));
Route::post('client/contact-us', array('uses'=>'ClientController@contactClient'));
Route::get('client/news', array('uses'=>'ClientController@news'));
Route::get('client/sectors', array('uses'=>'ClientController@sectors'));

// Need to have candidate auth
Route::get('save-job/{job_id}', array('as' => 'candidate.saveJob', function($job_id)
{
    if(!is_null(Session::get('candidate')))
    {
        $candidate_id = Session::get('candidate')->id;
        $saved = new SavedJob;
        $saved->job_id = $job_id;
        $saved->candidate_id = $candidate_id;
        $saved->save();

        return Redirect::back()->withInfo('Job added to saved list.'.link_to('candidate/applications', 'View Now'));
    }
    else
    {
        return Redirect::to('become-a-candidate')->with('info', 'Please login / register to view this page');
    }
}));

Route::get('save-job-remove/{job_id}', array('as' => 'candidate.removeJob', function($job_id)
{
    if(!is_null(Session::get('candidate')))
    {
        $candidate_id = Session::get('candidate')->id;
        $saved = SavedJob::where('candidate_id',$candidate_id)->where('id',$job_id)->first();
        $saved->delete();

        return Redirect::back()->withInfo('Job removed from saved list.');
    }
    else
    {
        return Redirect::to('become-a-candidate')->with('info', 'Please login / register to view this page');
    }
}));

Route::get('candidate', array('as' => 'candidate.profile', 'uses'=>'CandidateController@candidatesFrontPage'));

Route::post('candidate/imageUpload', function(){
    dd(Input::all());
    if(is_null(Session::get('candidate'))){
         return Redirect::to('become-a-candidate')->with('info', 'Please login / register to view this page');
    }

    $candidate = Candidate::find(Session::get('candidate')->id);
    $testimonial = Content::where('type','testimonial')->where('client_facing',1)->get()->random(1);

    $destinationPath = 'profile-image/';
    $allowedExts = array("gif", "jpeg", "jpg", "png");
    $statusMessage = '';
    
    if( Input::hasFile('profileimage') ){
        $extension = Input::file('profileimage')->getClientOriginalExtension();
        
        if( in_array($extension, $allowedExts) ){       
            $filename = Input::file('profileimage')->getClientOriginalName();
            $uploadSuccess = Input::file('profileimage')->move($destinationPath, $filename);
            
            if( $uploadSuccess ) {
                $statusMessage = 'Successuflly Uploaded';
            } else {
                $statusMessage = 'Upload Faild';
            }
        } else {
            $statusMessage = 'not Acceptable File Type';
        }
    } else {
        $statusMessage = 'Upload Faild';
    }
    
    return View::make('candidate.profile', array( 'statusMessage' => $statusMessage ))->with(compact('candidate'))->with(compact('testimonial'));;
});

Route::post('candidate/update-profile', function()
{
    if(!is_null(Session::get('candidate')))
    {
        $candidate = Candidate::find(Session::get('candidate')->id);
        $candidate->fill(Input::except('_token'));
        $candidate->save();
        return Redirect::to('candidate')->withInfo('Your profile has been updated.');
    }
    else
    {
        return Redirect::to('become-a-candidate')->with('info', 'Please login / register to view this page');
    } 
});

Route::post('candidate/update-password', function()
{
    if(!is_null(Session::get('candidate')))
    {
        $candidate = Candidate::find(Session::get('candidate')->id);
        $candidate->password = Hash::make(Input::get('password'));
        $candidate->save();
        return Redirect::to('candidate')->withInfo('Your password has been updated.');
    }
    else
    {
        return Redirect::to('become-a-candidate')->with('info', 'Please login / register to view this page');
    } 
});

Route::get('candidate/login', array('as' => 'candidate.login', function()
{
    return 'Candidate Login Page';
}));

Route::get('candidate/applications', array(
'as'   => 'candidate.applications', 
'uses' => 'CandidateController@getJobApplications'
));

Route::get('candidate/cv-tips', array('as' => 'candidate.cv-tips', function()
{
    if(!is_null(Session::get('candidate')))
    {
        $candidate = Candidate::find(Session::get('candidate')->id);
    return View::make('candidate.cvtips')->with(compact('candidate'));
    }
    else
    {
        return Redirect::to('become-a-candidate')->with('info', 'Please login / register to view this page');
    }

    
}));

Route::get('candidate/job-alerts', array('uses'=>'CandidateController@jobAlerts'));
Route::post('candidate/job-alerts', array('as'=>'post.candidate.job-alerts','uses'=>'CandidateController@jobAlertsPost'));

Route::group(array('before'=>'auth'),function ()
{
    Route::get('dashboard',array('as'=>'dashboard','uses'=>'AdminController@dashboard'));
    Route::get('dashboard/home',array('as'=>'home','uses'=>'AdminController@home'));
    Route::get('dashboard/sectors',array('as'=>'sectors','uses'=>'AdminController@sectors'));
    Route::get('dashboard/news',array('as'=>'news','uses'=>'AdminController@news'));
    Route::post('dashboard/news',array('uses'=>'AdminController@saveNews'));
    Route::get('dashboard/news/arquive',array('as'=>'newsarquive','uses'=>'AdminController@newsarquive'));
    Route::get('dashboard/news/edit/{id}',array('as'=>'newsedit','uses'=>'AdminController@newsedit'));
    Route::post('dashboard/news/edit/{id}',array('as'=>'newsedit','uses'=>'AdminController@newsUpdate'));
    Route::get('dashboard/news/delete/{id}',array('as'=>'newsdelete','uses'=>'AdminController@newsdelete'));
    Route::get('dashboard/about',array('uses'=>'AdminController@about'));
    Route::post('dashboard/about/upload',array('uses'=>'AdminController@saveAboutUploads'));

    Route::get('dashboard/testimonials',array('uses'=>'AdminController@testimonials'));
    Route::post('dashboard/testimonials',array('uses'=>'AdminController@savetestimonial'));
    Route::get('dashboard/testimonials/new',array('uses'=>'AdminController@newtestimonial'));
    Route::post('dashboard/testimonials/new',array('uses'=>'AdminController@savenewtestimonial'));
    Route::post('dashboard/testimonials/save/{id}',array('uses'=>'AdminController@savetestimonial'));

    // ---- CMS DOWNLOADS ------------------------------------------------
    Route::get('dashboard/downloads',array('uses'=>'DownloadsController@showDownloads'));
    Route::get('dashboard/newdownload',array('uses'=>'DownloadsController@newDownload'));
    Route::post('dashboard/savedownload',array('uses'=>'DownloadsController@saveNewDownload'));
    // -------------------------------------------------------------------

    // ---- CMS CANDIDATES -----------------------------------------------
    Route::get('dashboard/candidates',array('uses'=>'CandidateController@candidates'));
    Route::get('dashboard/candidates/view/{id?}',array('uses'=>'CandidateController@view'));
    Route::get('dashboard/candidates/view/{id}/edit',array('uses'=>'CandidateController@edit'));
    Route::post('dashboard/candidates/view/{id}/edit',array('uses'=>'CandidateController@edit_post'));
    Route::get('dashboard/candidates/view/{id}/activity',array('uses'=>'CandidateController@activity'));
    Route::get('dashboard/candidates/view/{id}/alert',array('uses'=>'CandidateController@alert'));
    Route::get('dashboard/candidates/view/{id}/feedback',array('uses'=>'CandidateController@feedback'));
    Route::get('dashboard/candidates/view/{id}/feedback/add',array('uses'=>'CandidateController@feedback_add'));
    Route::post('dashboard/candidates/view/{id}/feedback/add',array('uses'=>'CandidateController@feedback_add_post'));
    Route::get('dashboard/candidates/view/{id}/feedback/edit',array('uses'=>'CandidateController@feedback_edit'));
    Route::post('dashboard/candidates/view/{id}/feedback/edit',array('uses'=>'CandidateController@feedback_edit_post'));
    // -------------------------------------------------------------------

    // ---- CMS Career Resources -----------------------------------------
    Route::get('dashboard/covering_letter',array('uses'=>'AdminController@get_covering_letter'));
    Route::post('dashboard/covering_letter',array('uses'=>'AdminController@post_covering_letter'));

    Route::get('dashboard/how_to_write_a_cv',array('uses'=>'AdminController@get_how_to_write_a_cv'));
    Route::post('dashboard/how_to_write_a_cv',array('uses'=>'AdminController@post_how_to_write_a_cv'));

    Route::get('dashboard/interview_tips',array('uses'=>'AdminController@get_interview_tips'));
    Route::post('dashboard/interview_tips',array('uses'=>'AdminController@post_interview_tips'));

    Route::get('dashboard/career_management',array('uses'=>'AdminController@get_career_management'));
    Route::post('dashboard/career_management',array('uses'=>'AdminController@post_career_management'));
    // -------------------------------------------------------------------


    // ---- CMS ADMIN ----------------------------------------------------
    Route::get('cmsadmin',array('uses'=>'AdminController@cmsAdmin'));
    // -------------------------------------------------------------------

    Route::controller('adminDispatch','AdminDispatchController');
});

Route::get('test_job_alert_command', function () {
	// $output = "";
	
	// exec('dir', $output);
	// exec('php artisan candidates:send-alerts', $output);

	// return Response::make($output);
});
