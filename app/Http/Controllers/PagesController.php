<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Journal;
use View;
use App\Before;
use App\Progress;
use App\User;
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
		if (Auth::check()) {
			$before_query = Before::where('user_id', '=', Auth::user()->id)->first();
			$progress_pic = Progress::where('user_id', '=', Auth::user()->id)->orderBy('id','DESC')->first();
		}else{
			return view("pages.home")
			->with('title',$title);
		}
		return view("pages.home")
		->with('title',$title)
		->with('before',$before_query)
		->with('progress',$progress_pic);
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
		$user_info = User::find(16);
		$user_gallery = DB::table('gallery_images')->where('user_id',$id)->take(12)->get();
		$data = array('info' => $user_info, 'gallery' => $user_gallery);
		$progress_pic = Progress::where('user_id', '=', $id)->orderBy('id','ASC')->get();
		return view("pages.profile")
			->with('info',$user_info)
			->with('user_gallery',$user_gallery)
			->with('progress_pic',$progress_pic)
			->with('title','Profile of '.Auth::user()->username);
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

	public function journal($id)
	{
		$title = "Journal";
		//$user_journal = DB::table('journal')->where('user_id',$id)->orderBy('created_at', 'id', 'desc')->paginate(5);
		if(Auth::user()->id == $id)
		{
			$user_journal = Journal::where('user_id', '=', $id)->get();
		}
		else
		{
			$user_journal = Journal::where('user_id', '=', $id)->where('visible', '=', 1)->get();
		}
		return View::make("pages.journal")
			->with('title', 'Journal')
			->with('user_id', $id)
			->with('journal', $user_journal);
	}

}
