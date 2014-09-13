<?php

class AdminDispatchController extends \BaseController {

	public function postSavenewhomepagemessage()
	{
		$validator = Validator::make(Input::all(),array('text'=>'required|min:5'));
		if($validator->fails())
		{
			$output = array('result'=>0,'error'=>'');
			foreach($validator->messages()->all() as $m)
			{
				$output['error'] .= $m.' ';
			}
			return json_encode($output);
		}

		$message = new Content;
		$message->type = 'homepage';
		$message->body = Input::get('text');
		$message->save();

		$output['result'] = 1;
		$output['content'] = View::make('snippets.messagebox',array(
			'message'=>$message,
			'position' => Content::get()->count()
			))->render();

		return Response::json($output);
	}

	public function postDeletehomepagemessage()
	{
		$validator = Validator::make(Input::all(),array('id'=>'required|integer'));
		if($validator->fails())
		{
			$output = array('result'=>0,'error'=>'');
			foreach($validator->messages()->all() as $m)
			{
				$output['error'] .= $m.' ';
			}
			return Response::json($output);
		}
		$output['id'] = Input::get('id');
		$output['result'] = 1;
		Content::destroy(Input::get('id'));
		return Response::json($output);
	}

	public function postUpdatehomepagemessage()
	{
		$validator = Validator::make(Input::all(),array(
			'id'=>'required|integer',
			'text' => 'required|min:5'
		));
		if($validator->fails())
		{
			$output = array('result'=>0,'error'=>'');
			foreach($validator->messages()->all() as $m)
			{
				$output['error'] .= $m.' ';
			}
			return Response::json($output);
		}
		$content = Content::find(Input::get('id'));
		$content->body = Input::get('text');
		$content->save();
		$output['result'] = 1;
		return Response::json($output);
	}

	public function postRemoveuser()
	{
		$user = User::find(Input::get('id'));

		if(!$user)
		{
			return Response::json(array('result'=>0,'error'=>'User not found'));
		}

		$output['result'] = 1;
		$output['content'] = View::make('admin.cmsadmin.removeuser')->withUser($user)->render();

		return Response::json($output);
	}

	public function postDoremoveuser()
	{
		$user = User::find(Input::get('id'));

		if(!$user)
		{
			return Response::json(array('result'=>0,'error'=>'User not found'));
		}

		$user->delete();

		$output['result'] = 1;
		$output['content'] = View::make('admin.cmsadmin.removeuser')->withUser($user)->render();

		return Response::json($output);
	}

	public function postEdituser()
	{
		$user = User::find(Input::get('id'));

		if(!$user)
		{
			return Response::json(array('result'=>0,'error'=>'User not found'));
		}

		$output['result'] = 1;
		$output['content'] = View::make('admin.cmsadmin.edituser')->withUser($user)->render();

		return Response::json($output);
	}

	public function postCreateuser()
	{

		$output['result'] = 1;
		$output['content'] = View::make('admin.cmsadmin.createuser')->render();

		return Response::json($output);
	}

	public function postDocreateuser()
	{
		$validator = Validator::make(Input::all(),array(
			'email'=>'required|email|unique:users,email',
			'password' => 'required|min:6',
			'name' => 'required|min:3'
		));

		if($validator->fails())
		{
			$output = array('result'=>0,'error'=>'');
			foreach($validator->messages()->all() as $m)
			{
				$output['error'] .= $m.' ';
			}
			return Response::json($output);
		}
		$user = new User;

		$user->email = Input::get('email');
		$user->name = Input::get('name');
		$user->password = Hash::make(Input::get('password'));
		$user->active = 1;

		$user->save();

		return Response::json(array('result'=>1));
	}

	public function postDoupdateuser()
	{
		$validator = Validator::make(Input::all(),array(
			'email'=>'required|email',
			'name' => 'required|min:3'
		));

		if($validator->fails())
		{
			$output = array('result'=>0,'error'=>'');
			foreach($validator->messages()->all() as $m)
			{
				$output['error'] .= $m.' ';
			}
			return Response::json($output);
		}
		$user = User::find(Input::get('id'));
		if(!$user)
		{
			$output = array('result'=>0,'error'=>'User not found');
			return Response::json($output);
		}
		$user->email = Input::get('email');
		$user->name = Input::get('name');
		if(Input::get('password')) $user->password = Hash::make(Input::get('password'));
		$user->save();
		return Response::json(array('result'=>1));
	}

	public function postToggleuser()
	{
		$user = User::find(Input::get('id'));

		if(!$user)
		{
			$output = array('result'=>0,'error'=>'User not found');
			return Response::json($output);
		}

		$user->active = $user->active==1?0:1;
		$user->save();

		return Response::json(array('result'=>1));
	}

	public function postSaveabout()
	{
		$content = Content::where('type','about')->where('subtype','about')->first();
		
		// if($content->isEmpty())
		// {
		// 	$content = new Content;
		// 	$content->type = 'about';
		// 	$content->subtype = 'about';
		// 	$content->save();
		// }

		

		$content->intro = Input::get('intro');
		$content->body = Input::get('body');

		$content->save();


		$history = Content::where('type','about')->where('subtype','history')->first();

		// if(!$history)
		// {
		// 	$content = new Content;
		// 	$content->type = 'about';
		// 	$content->subtype = 'history';
		// 	$content->save();
		// }

		$history->intro = Input::get('history_intro');
		$history->body = Input::get('history_body');

		$history->save();

		return Response::json(array('result'=>1));
	}

	public function postEdittestemonial()
	{
		$testemonial = Content::find(Input::get('id'));

		if(!$testemonial)
		{
			return Response::json(array('result'=>0,'error'=>'Testemonial not found'));
		}

		$output['result'] = 1;
		$output['content'] = View::make('admin.testemonials.edit')->withTestemonial($testemonial)->render();

		return Response::json($output);
	}
	public function postSavetestemonial()
	{
		$validator = Validator::make(Input::all(),array(
			'id' => 'required|integer',
			'body'=>'required|min:10',
			'title' => 'required|min:5',
			'intro' => 'required|min:5',
			'client_facing' => 'required'
		));
		if($validator->fails())
		{
			$output = array('result'=>0,'error'=>'');
			foreach($validator->messages()->all() as $m)
			{
				$output['error'] .= $m.' ';
			}
			return Response::json($output);
		}
		$testimonial = Content::find(Input::get('id'));

		if(!$testimonial)
		{
			$output = array('result'=>0,'error'=>'Testemonial not found');
			return Response::json($output);
		}

		$testimonial->body = Input::get('body');
		$testimonial->title = Input::get('title');
		$testimonial->intro = Input::get('intro');
		$testimonial->client_facing = Input::get('client_facing');

		$testimonial->save();

		return Response::json(array('result'=>1));
	}

	public function postDeletetestemocial()
	{
		$testimonial = Content::find(Input::get('id'));

		if(!$testimonial)
		{
			$output = array('result'=>0,'error'=>'Testemonial not found');
			return Response::json($output);
		}

		$testimonial->delete();

		return Response::json(array('result'=>1));
	}
	public function postSavecandidatenotes()
	{
		$candidate = Candidate::find(Input::get('id'));

		if(!$candidate)
		{
			return Response::json(array('result'=>0,'error'=>'Candidate not found'));
		}
		$candidate->notes = Input::get('notes');
		$candidate->save();
		
		return Response::json(array('result'=>1));
	}
}
