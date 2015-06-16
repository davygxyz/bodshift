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
	
	
	
}