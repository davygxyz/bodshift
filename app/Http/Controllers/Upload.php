<?php namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManager\Make;
use Input;
use Validator;
use Request;
use Session;
use DB;
use Auth;
class Upload extends Controller {
	public function index(){
	}
	public function userGallery() {
	$file = Request::file('file');
	$destinationPath = public_path().'/uploads/user/photo_gallery';
	// If the uploads fail due to file system, you can try doing public_path().'/uploads' 
	$filename = str_random(12);
	//$filename = $file->getClientOriginalName();
	//$extension =$file->getClientOriginalExtension(); 
	$user_id = Auth::id();
	//DB::select("INSERT INTO gallery_images(file,user_id) Values('$filename','$user_id')");
	$upload_success = Request::file('file')->move($destinationPath, $filename);
	if( $upload_success ) {
		echo $destinationPath;
	   //return Response::json('success', 200);
	} else {
	   //return Response::json('error', 400);
	}
	}
}