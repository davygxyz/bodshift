<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Intervention\Image\ImageManager\Make;

use Input;
use Validator;
use Redirect;
use Request;
use Session;
use DB;
use Auth;
use App\Before;
use App\Progress;
use App\User;
class Delete extends Controller {

	public function galleryImage($id){
		$user_id = Auth::id();
		DB::table('gallery_images')->where('id', $id)->delete();

		return Redirect::back();

	}


	public function journal($id){
		$user_id = Auth::id();
		DB::table('journal')->where('id', $id)->delete();
		return Redirect::back();

	}

	public function progress($id){
		Progress::where('id','=',$id)->delete();
		return Redirect::back();
	}

	public function before($id){
		Before::where('id','=',$id)->delete();
		return Redirect::back();
	}


}