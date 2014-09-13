<?php

class HomeController extends BaseController {

	public function homepage()
	{
		$output = array();

		$output['messages'] = Content::where('type','homepage')->get();
		$output['testimonial'] = Content::where('type','testimonial')->where('candidate_facing',1)->get()->random(1);
		$output['latest'] = JobController::getLatestJobs();
		if (Session::has('candidate')) {
			$output['candidate'] = Session::get('candidate');
		}

		return View::make('homepage.main',$output);
	}

	public function about()
	{
		$content = Content::where('type','about')->first();
		$testimonial = Content::where('type','testimonial')->where('candidate_facing',1)->get()->random(3);
		$history = Content::where('type','about')->where('subtype','history')->first();
		return View::make('about')->withContent($content)->withTestimonials($testimonial)->withHistory($history);
	}

	public function news()
	{
		$content = Content::where('type','news')->where('subtype',null)->orderBy('date','DESC')->paginate(5);
		$recent = Content::where('type','news')->where('subtype',null)->orderBy('date', 'DESC')->limit(3)->get();

		return View::make('news')->withContent($content)->withRecent($recent);
	}

	public function newsItem($newsItem)
	{
		$newsItemParts = explode('-', $newsItem);
	    $newsItem = Content::where('type','news')->where('id',$newsItemParts[0])->get();
	    $recent = Content::where('type','news')->where('subtype',null)->orderBy('date', 'DESC')->limit(3)->get();
	    return View::make('new')->withContent($newsItem)->withRecent($recent);
	}

	public function candidate()
	{
		return View::make('homepage.candidate');
	}

	public function contact()
	{
		return View::make('contact-us');
	}

	public function sendcontact()
	{
		$data = Input::all();

		// Send contact email
		Mail::send('emails.candidate.contact', $data, function($message) use($data)
		{
		    $message->to($data['email'], $data['name'])->subject('KDC - Contact');
		    $message->to('candidates@kdcresource.com', 'KDC')->subject('KDC - Contact Submission');
		});

		return Redirect::to('/')->withInfo('Thanks your message has been sent.');
	}

	public function legal()
	{
		return View::make('legal');
	}
}
