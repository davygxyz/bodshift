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
use App\User;



class Update extends Controller {
	public function postBefore()
	{
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
		Before::where('user_id', '=', $user_id)->update(['weight' => $data['weight'],'file' => $filename]);
	    return Redirect::back();
	}
	public function editInfo(){
		$data = Request::all();
		$validation = Validator::make($data,[
			'name' => 'required|max:255',
			'email' => 'required|email|max:255|confirmed',
			'password' => 'confirmed|min:6',
			'username' => 'required|max:255',
			'birthday' => 'required',
			'weight' => 'required|max:3',
			'about' => 'max:500',
			'sex' => 'required',
			'file' => 'max:10000|mimes:jpeg,png,gif,jpg'
		]);

		if ($validation->fails())
		{
		 	return redirect()->back()->withErrors($validation->errors());
		}
		//$data = array_filter($data);
		User::find(Auth::user()->id)->update(['name' => $data['name'],'email' => $data['email'],'username' => $data['username'],'sex' => $data['sex'],'birthday' => $data['birthday'],'weight' => $data['weight'],'ft' => $data['ft'],'inch' => $data['inch'],'about' => $data['about']]);
		
		if(!empty($data['password'])){
			User::find(Auth::user()->id)->update(['password' => $data['password']]);
		}

		$file_request = Request::file('file');

		if(!empty($file_request)){
			$file = Request::file('file');
			$destinationPath = public_path().'/uploads/user/profile_pic';
			// If the uploads fail due to file system, you can try doing public_path().'/uploads' 
			$filename = str_random(12);
			//$filename = $file->getClientOriginalName();
			//$extension =$file->getClientOriginalExtension(); 
			$upload_success = Request::file('file')->move($destinationPath, $filename);
			User::find(Auth::user()->id)->update(['avatar' => $filename]);
		}

		return Redirect::back();

	}
	
	
	
}