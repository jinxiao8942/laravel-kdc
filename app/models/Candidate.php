<?php

class Candidate extends \Eloquent {
    protected $table = 'candidate';
	protected $fillable = [
	'address_house_number',
	'address_street',
	'address_address_2',
	'address_county',
	'address_city',
	'address_postcode',
	'activation_code',
	'email',
	'name',
	'surname',
	'current_position',
	'phone'
	];

	static public function sendActivation($candidate_id)
	{
		// Generate activation code
		$code = str_random(25);

		$c = Candidate::find($candidate_id);
		$c->activation_code = $code;
		$c->save();

		$data = [];
		$data['candidate'] = $c;

		// Send activation email - Just in case they missed it when registering
		Mail::send('emails.candidate.activation', $data, function($message) use($c)
		{
		    $message->to($c->email, $c->name . ' ' . $c->surname)->subject('KDC - Activate your account');
		});
	}

	static public function sendReset($candidate_id)
	{
		// Generate activation code
		$code = str_random(25);

		$c = Candidate::find($candidate_id);
		$c->password_reset_code = $code;
		$c->save();

		$data = [];
		$data['candidate'] = $c;

		// Send activation email - Just in case they missed it when registering
		Mail::send('emails.candidate.reset', $data, function($message) use($c)
		{
		    $message->to($c->email, $c->name . ' ' . $c->surname)->subject('KDC - Reset your password');
		});
	}


	static public function sendBecomeCandidate($input, $cv)
	{
		$data = $input;

		if(!empty($cv))
		{

			// Send welcome email
			Mail::send('emails.candidate.become', $data, function($message) use($input, $cv)
			{
			    $message->to($input['email'], $input['name'])->subject('KDC - Become a candidate');
			    // $message->bcc('candidates@kdcresource.com', 'KDC')->subject('New candidate received online');
				$message->attach(public_path().'/uploads/cvs/'.$cv);	
			    
			});

		}
		else
		{
			// Send welcome email
			Mail::send('emails.candidate.become', $data, function($message) use($input)
			{
			    $message->to($input['email'], $input['name'])->subject('KDC - Become a candidate');
			    // $message->bcc('candidates@kdcresource.com', 'KDC')->subject('New candidate received online');			    
			});
		}
	}


	static public function sendContact($input)
	{
		$data = $input;

		// Send contact email
		Mail::send('emails.cantidate.contact', $data, function($message) use($input)
		{
		    $message->to($input['email'], $input['name'])->subject('KDC - Contact');
		    $message->to('candidates@kdcresource.com', 'KDC')->subject('KDC - Contact Submission');
		});
	}

	/*
	 * Relations
	 */

	public function jobAlerts()
	{
		return $this->hasMany(\JobAlerts, 'candidate_id');
	}
}
