<?php namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Input;
use Validator;
use Request;
use Session;
use DB;
use Redirect;
use Auth;
use App\Before;
use App\Progress;
use App\Journal;



class Upload extends Controller {
		public function getDates()
	{
	    return ['created_at'];
	}
	
	public function userGallery() {
	$file = Request::file('file');
	$destinationPath = public_path().'/uploads/user/photo_gallery';
	// If the uploads fail due to file system, you can try doing public_path().'/uploads' 
	$filename = str_random(12);
	//$filename = $file->getClientOriginalName();
	//$extension =$file->getClientOriginalExtension(); 
	$user_id = Auth::id();


	DB::table('gallery_images')->insert(
    array('file' => $filename, 'user_id' => $user_id)
	);
	$upload_success = Request::file('file')->move($destinationPath, $filename);
	if( $upload_success ) {
	   return Response::json('success', 200);
	} else {
	   return Response::json('error', 400);
	}
	}


	public function userJournal() {
		$user_id = Auth::id();
		$data = Request::all();
		$validation = Journal::validate($data);
		if ($validation->fails())
		{
		 	return redirect()->back()->withErrors($validation->errors());
		}
		if(isset($data['private'])){
			$data['private'] = 0;
		}else{
			$data['private'] = 1;
		}
		Journal::create(array('name' => $data['name'],'content' => $data['content'], 'user_id' => $user_id, 'visible' => $data['private']));
		return Redirect::back();
		
	}

	public function postBefore() {
		$user_id = Auth::id();
		$data = Request::all();
		$validation = Before::validate($data);
		if ($validation->fails())
		{
		 	return redirect()->back()->withErrors($validation->errors());
		}


		$file = Request::file('file');
		$destinationPath = public_path().'/uploads/user/progress';
		// If the uploads fail due to file system, you can try doing public_path().'/uploads' 
		$filename = str_random(12);
		//$filename = $file->getClientOriginalName();
		//$extension =$file->getClientOriginalExtension(); 
		$upload_success = Request::file('file')->move($destinationPath, $filename);
		Before::create(array('file' => $filename,'user_id' => $user_id,'weight' => $data['weight'],'date' => $data['fdate']));
		return Redirect::back();
		
	}
	public function postProgress() {
		$user_id = Auth::id();
		$data = Request::all();
		$validation = Progress::validate($data);
		if ($validation->fails())
		{
		 	return redirect()->back()->withErrors($validation->errors());
		}


		$file = Request::file('file');
		$destinationPath = public_path().'/uploads/user/progress';
		// If the uploads fail due to file system, you can try doing public_path().'/uploads' 
		$filename = str_random(12);
		//$filename = $file->getClientOriginalName();
		//$extension =$file->getClientOriginalExtension(); 
		$upload_success = Request::file('file')->move($destinationPath, $filename);
		Progress::create(array('file' => $filename,'user_id' => $user_id,'weight' => $data['weight'],'date' => $data['fdate']));
		return Redirect::back();
		
	}
}