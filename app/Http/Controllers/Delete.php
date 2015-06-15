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


}