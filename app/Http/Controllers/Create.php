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
use App\User;
use App\Comment;
use App\Newsfeed;

class Create extends Controller {

	public function postComment(){

		$user_id = Auth::id();
		$data = Request::all();

		$newsfeed = Newsfeed::firstOrCreate(array('user_id' => $data['receive_id']));
		echo $newsfeed->id;
		Comment::create(array('sending_id' => $user_id,'receiving_id' => $data['receive_id'],'newsfeed_id' => $newsfeed->id,'comment' => $data['feedpost']));
		return Redirect::back();

	}


}