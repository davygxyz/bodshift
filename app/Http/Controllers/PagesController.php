<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use DB;
class PagesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
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
		$user_info = $user_info[0];
		return view("pages.profile",['user_info' => $user_info]);
	}

}
