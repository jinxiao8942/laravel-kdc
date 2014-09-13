<?php

class CommonController extends BaseController {

	public function login()
	{
		return View::make('login');
	}

	public function logout()
	{
		Session::flush();
		return Redirect::to('/');
	}

	public function doLogin()
	{
		if (Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password'), 'active'=>1)))
		{
		    return Redirect::intended('dashboard');
		}

		$errors = new Illuminate\Support\MessageBag;
		$errors->add('error','An error occurred while logging in. Check your username/password and try again.');
		return Redirect::to('login')->withInput(Input::except('password'))->withErrors($errors);
	}
}
