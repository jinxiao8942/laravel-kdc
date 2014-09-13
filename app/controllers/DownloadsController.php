<?php

class DownloadsController extends \BaseController {

	public function showDownloads()
	{
		$downloads = Content::where('type','download')->get();
		return View::make('admin/downloads/list')->withDownloads($downloads);
	}

	public function newDownload()
	{
		$download = '';

		if(Input::has('id'))
		{
			$download = Content::find(Input::get('id'));
		}
		else
		{
			$download = new Content;
		}

		return View::make('admin/downloads/new')->withDownloads($download);
	}

	public function saveNewDownload()
	{
		if(Input::hasFile('download_file'))
		{
			$content = new Content;
			$content->type = 'download';
			$content->active = 0;
			$content->candidate_facing = 1;
			$content->client_facing = 0;
			$content->body = uniqid().'.'.Input::file('download_file')->getClientOriginalExtension();
			
			Input::file('download_file')->move(public_path().'/docs/',$content->body);

			$content->title = Input::get('name');

			$content->save();

			return Redirect::to('dashboard/downloads');
		}
		else
		{
			$content = new Content;

			$content->title = Input::get('name');
		}
	}

}
