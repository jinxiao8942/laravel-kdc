<?php

class AdminController extends BaseController {

	public function dashboard()
	{
		return View::make('admin.dashboard');
	}

	public function home()
	{
		$messages = Content::where('type','homepage')->get();
		return View::make('admin.home')->withMessages($messages);
	}

	public function sectors()
	{
		$sectors = Content::where('type','sectors')->get();
		return View::make('admin.sectors')->withMessages($sectors);
	}

	public function news()
	{
		return View::make('admin.createnews');
	}
	public function newsarquive()
	{
		$type = Input::get('type');
		if($type == 'job')
		{
			$news = Content::where('type','news')->where('subtype','job');
		}
		else
		{
			$news = Content::where('type','news');
		}
		
		$month = Input::get('month');
		if(count($month) == 1){
			$a = 0;
			$month = $a.$month;
		}
		$year = Input::get('year');
		if(isset($month) && isset($year))
		{
			$news = $news->whereRaw('CONVERT(VARCHAR, created_at, 120) LIKE ?', ["%$year-$month-%"]);
		}
		$news = $news->get();
		// dd($news);
		return View::make('admin.newsarquive')->withMessages($news);
	}

	public function newsedit($id)
	{
		$news = Content::where('type','news')->where('id', $id)->first();

		return View::make('admin.editnews')->withNews($news);
	}

	public function newsdelete($id)
	{
		$news = Content::where('type','news')->where('id', $id)->first();
		$news->delete();

		return Redirect::back()->withInfo('New article has now been deleted');
	}

	public function saveNews()
	{
		
		$validator = Validator::make(Input::all(),array(
			'title' => 'required|min:5',
			'body' => 'required|min:50',
			'intro' => 'required|min:5|max:400',
			'datetime' => 'required'
		));

		if($validator->fails())
		{
			$output = array('result'=>0,'error'=>'');
			foreach($validator->messages() as $m)
			{
				$output['error'] .= $m.' ';
			}
			return Redirect::to('dashboard/news')->withInput()->withErrors($validator->messages());
		}

		$content = new Content;

		// If there is an image then lets upload it
		$img = Input::file('img');
		// dd(preg_replace('/(..)\/(..)\/(....)/', "$3-$2-$1", Input::get('datetime')));
		if($img)
		{
			$file = Input::file('img');
			$destinationPath = 'uploads/news_imgs/';
			$extension = $file->getClientOriginalExtension(); 
			$filename = str_random(12).'.'.$extension;

			$upload_success = Input::file('img')->move($destinationPath, $filename);

			if( $upload_success ) {

				$content->image = $destinationPath.$filename;
			}
		} 
		elseif($imgstr = Input::get('img'))
		{
			$destinationPath = 'uploads/news_imgs/';
			$content->image = $destinationPath.$imgstr;
		}
		else {
			$content->image = '';
		}

		

		$content->title = Input::get('title');
		$content->body = Input::get('body');
		$content->type = 'news';
		$content->intro = Input::get('intro');
		$content->description = Input::get('description');
		$content->date = Input::get('datetime');
		
		$content->image_alt = Input::get('img_alt');
		$content->image_text = Input::get('img_title');
		// $content->date = preg_replace('/(..)\/(..)\/(....)/', "$3-$2-$1", Input::get('datetime'));
		$content->url = Input::get('url');

		$type = Input::get('type');
		// dd($type);
		if($type == 'job')
		{
			$content->subtype = 'job';
		}


		$content->save();

		return Redirect::to('dashboard/news/arquive');
	}

	public function newsUpdate($id)
	{
		// dd(Input::all());
		$validator = Validator::make(Input::all(),array(
			'title' => 'required|min:5',
			'body' => 'required|min:50',
			'intro' => 'required|min:5|max:400',
			'datetime' => 'required'
		));

		if($validator->fails())
		{
			$output = array('result'=>0,'error'=>'');
			foreach($validator->messages() as $m)
			{
				$output['error'] .= $m.' ';
			}
			return Redirect::back()->withInput()->withErrors($validator->messages());
		}

		$content = Content::find($id);

		// If there is an image then lets upload it
		$img = Input::file('img');
		if($img)
		{
			$file = Input::file('img');
			$destinationPath = 'uploads/news_imgs/';
			$extension = $file->getClientOriginalExtension(); 
			$filename = str_random(12).'.'.$extension;

			$upload_success = Input::file('img')->move($destinationPath, $filename);

			if( $upload_success ) {

				$content->image = $destinationPath.$filename;
			}
		} elseif($imgstr = Input::get('img'))
		{
			$destinationPath = 'uploads/news_imgs/';
			$content->image = $destinationPath.$imgstr;
		}

		$content->title = Input::get('title');
		$content->body = Input::get('body');
		$content->type = 'news';
		$content->intro = Input::get('intro');
		$content->description = Input::get('description');
		$content->date = Input::get('datetime');
		
		$content->image_alt = Input::get('img_alt');
		$content->image_text = Input::get('img_title');
		// $content->date = preg_replace('/(..)\/(..)\/(....)/', "$3-$2-$1", Input::get('datetime'));
		$content->url = Input::get('url');

		$content->save();

		return Redirect::to('dashboard/news/arquive');
	}

	public function cmsAdmin()
	{
		return View::make('admin/cmsadmin')->withUsers(User::get());
	}

	public function about()
	{
		// $content = Content::where('type','about')->first();
		$content = Content::where('type','about')->where('subtype','about')->first();
		$history = Content::where('type','about')->where('subtype','history')->first();

		// if(!$content)
		// {
		// 	$tempText = 'Lorem Ipsum';
		// 	$content = new Content;
		// 	$content->type = 'about';
		// 	$content->body = $tempText;
		// 	$content->intro = $tempText;

		// 	$content->save();

		// }

		return View::make('admin/about')->with(compact('content'))->with(compact('history'));
	}

	public function saveAboutUploads()
	{

		$file_1_db = Upload::where('where', 'about_1')->first();
		if(empty($file_1_db))
		{
			$file_1_row = new Upload;
			$file_1_row->where = 'about_1';
		}
		else 
		{
			$file_1_row = $file_1_db;
		}
		// If there is a file then lets upload it
		$file_1 = Input::file('download_1_file');
		if($file_1)
		{
			$file = Input::file('download_1_file');
			$destinationPath = 'uploads/about/';
			$extension = $file->getClientOriginalExtension(); 
			$filename = str_random(12).'.'.$extension;

			$upload_success = Input::file('download_1_file')->move($destinationPath, $filename);

			if( $upload_success ) {

				$file_1_row->file_location = $destinationPath.$filename;
				$file_1_row->file_type = $extension;
				$file_1_row->file_name = $file->getClientOriginalName();
				$file_1_row->title = Input::get('download_1');

				$file_1_row->save();

				
			}
		} 



		$file_2_db = Upload::where('where', 'about_2')->first();
		if(empty($file_2_db))
		{
			$file_2_row = new Upload;
			$file_2_row->where = 'about_2';
		}
		else 
		{
			$file_2_row = $file_2_db;
		}
		// If there is a file then lets upload it
		$file_1 = Input::file('download_2_file');
		if($file_1)
		{
			$file = Input::file('download_2_file');
			$destinationPath = 'uploads/about/';
			$extension = $file->getClientOriginalExtension(); 
			$filename = str_random(12).'.'.$extension;

			$upload_success = Input::file('download_2_file')->move($destinationPath, $filename);

			if( $upload_success ) {

				$file_2_row->file_location = $destinationPath.$filename;
				$file_2_row->file_type = $extension;
				$file_2_row->file_name = $file->getClientOriginalName();
				$file_2_row->title = Input::get('download_2');

				$file_2_row->save();
			}
		} 	

		return Redirect::back();
	}

	public function testimonials()
	{
		$testimonials = Content::where('type','testimonial')->get();
		return View::make('admin/testimonials')->withTestimonials($testimonials);
	}

	public function savetestimonial($id)
	{
		// dd(Input::all());
		$testimonial = Content::find($id);

		$testimonial->body = Input::get('body');
		$testimonial->title = Input::get('title');
		$testimonial->intro = Input::get('intro');
		switch (Input::get('client_facing')) {
			case 'both':
				$testimonial->candidate_facing = 1;
				$testimonial->client_facing = 1;
				break;
			case 'candidate':
				$testimonial->candidate_facing = 1;
				$testimonial->client_facing = 0;
				break;
			case 'client':
				$testimonial->candidate_facing = 0;
				$testimonial->client_facing = 1;
				break;
		}

		$testimonial->save();

		return Redirect::to('dashboard/testimonials');
	}

	public function newtestimonial()
	{
		return View::make('admin/newtestimonial');
	}

	public function editTertimonial($value='')
	{
		
	}

	public function savenewtestimonial()
	{
		$validator = Validator::make(Input::all(),array(
			'body'=>'required|min:10',
			'title' => 'required|min:5',
			'intro' => 'required|min:5',
			'client_facing' => 'required'
		));
		if($validator->fails())
		{
			return Redirect::to('dashboard/testimonials/new')->withErrors($validator);
		}
		$testimonial = new Content;

		$testimonial->type = 'testimonial';
		$testimonial->body = Input::get('body');
		$testimonial->title = Input::get('title');
		$testimonial->intro = Input::get('intro');

		$testimonial->save();

		return Redirect::to('dashboard/testimonials');
	}







	public function get_covering_letter()
	{
		$content = Content::where('type','career_resource')->where('subtype','covering_letter')->first();
		return View::make('admin/covering_letter')->withContent($content);
	}

	public function post_covering_letter()
	{
		$content = Content::where('type','career_resource')->where('subtype','covering_letter')->first();

		$content->intro = Input::get('intro');
		$content->body = Input::get('body');

		$content->save();

		return Redirect::back()->withInfo('Thanks. Your changes have been made.');
	}




	public function get_how_to_write_a_cv()
	{
		$content = Content::where('type','career_resource')->where('subtype','how_to_write_a_cv')->first();
		return View::make('admin/how_to_write_a_cv')->withContent($content);
	}

	public function post_how_to_write_a_cv()
	{
		$content = Content::where('type','career_resource')->where('subtype','how_to_write_a_cv')->first();

		$content->intro = Input::get('intro');
		$content->body = Input::get('body');

		$content->save();

		return Redirect::back()->withInfo('Thanks. Your changes have been made.');
	}





	public function get_interview_tips()
	{
		$content = Content::where('type','career_resource')->where('subtype','interview_tips')->first();
		return View::make('admin/interview_tips')->withContent($content);
	}

	public function post_interview_tips()
	{
		$content = Content::where('type','career_resource')->where('subtype','interview_tips')->first();

		$content->intro = Input::get('intro');
		$content->body = Input::get('body');

		$content->save();

		return Redirect::back()->withInfo('Thanks. Your changes have been made.');
	}




	public function get_career_management()
	{

		$content = Content::where('type','career_resource')->where('subtype','career_management')->first();
		return View::make('admin/career_management')->withContent($content);
	}

	public function post_career_management()
	{
		$content = Content::where('type','career_resource')->where('subtype','career_management')->first();

		$content->intro = Input::get('intro');
		$content->body = Input::get('body');

		$content->save();

		return Redirect::back()->withInfo('Thanks. Your changes have been made.');
	}
	

}
