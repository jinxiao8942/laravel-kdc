<?php

// Controller responsible for the Homepage for the "Client" (in the business sense) side of the site.
class ClientController extends BaseController {

	public function homepage()
	{
		return View::make('client.main',array());
	}

	public function about() 
	{
		$testimonial = Content::where('type','testimonial')->where('client_facing',1)->get()->random(1);
		return View::make('client.about',array())->with(compact('testimonial'));
	}

	public function sectors() 
	{
		return View::make('client.sectors',array());
	}

	public function becomeClient()
	{
		return View::make('client.become-a-client', array());
	}
	
	public function contactClient()
	{
		$input = Input::all();
		
		$data = $input;
		
		Mail::send('emails.client.contact', $data, function($message) use($input)
		{
		    $message->to($input['email'], $input['fullName'])->subject('KDC client contact');
		    $message->bcc('matt@matthewhanson.co.uk', 'KDC')->subject('New client contact');
		});
		
		return Redirect::to('client/contact-us')->withInfo('Your contact message has been received.');
	}

	public function saveClient()
	{
		$input = Input::all();

		// Send email to KDC
		$data = $input;

		// Send activation email - Just in case they missed it when registering
		Mail::send('emails.client.become', $data, function($message) use($input)
		{
		    $message->to($input['email'], $input['forename'] . ' ' . $input['surname'])->subject('KDC - Become a client');
		    $message->bcc('clientapplication@kdcresource.com', 'KDC')->subject('New client registration');
		});

		return Redirect::to('client')->withInfo('Your details have been sent.');
	}

	public function contactUs() 
	{
		return View::make('client.contact-us', array());
	}

	public function news() 
	{
		$content = Content::where('type','news')->where('subtype',null)->orderBy('date','DESC')->paginate(5);
		$recent = Content::where('type','news')->where('subtype',null)->orderBy('date', 'DESC')->limit(3)->get();
		return View::make('client.news')->withContent($content)->withRecent($recent);
	}
}
