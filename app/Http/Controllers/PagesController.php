<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use DB;
use Auth;
class PagesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	//logged in user


	public function index()
	{
		$title = "Home";
		return view("pages.home",['title' => $title]);
	}

	public function about()
	{
		$title = "About";
		return view("pages.about",['title' => $title]);
	}

	public function donate()
	{
		$title = "Donate";
		return view("pages.donate",['title' => $title]);
	}

	public function contactus()
	{
		$title = "Contact Us";
		return view("pages.contactus",['title' => $title]);
	}

	public function motivation()
	{
		$video_query = DB::table('mot_videos')->paginate(3);
		$quote_query = DB::table('mot_images')->paginate(3);
		

		return view("pages.motivation",['video_query' => $video_query],['quote_query' => $quote_query]);
	}

	public function profile($id)
	{
		$user_info = DB::select('select * from users where id = ?', [$id]);
		$user_gallery = DB::table('gallery_images')->where('user_id',$id)->take(12)->get();
		$user_info = $user_info[0];
		$data = array('info' => $user_info, 'gallery' => $user_gallery);
		return view("pages.profile",compact('data'));
	}

	public function photo_gallery($id)
	{
		$user_gallery = DB::table('gallery_images')->where('user_id',$id)->get();
		$title = "Gallery";

		// If the gallery is not current users, it will show the 'GET' users profile.
		/*if($id != $logged_in){
			$user_info = DB::select('select * from users where id = ?', [$id]);
			$user_info = $user_info[0];
			return view("pages.profile",['user_info' => $user_info]);
		}*/

		$data = array('query' => $user_gallery, 'title' => $title, 'id' => $id);
		return view("pages.photo_gallery",compact('data'));
	}

}
