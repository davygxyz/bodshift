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
use Redirect;
class PagesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	//logged in user


	public function index()
	{

		$allUsers =  User::orderByRaw('RAND()')->take(12)->get();
		$title = "Home";
		if (Auth::check()) {
			$before_query = Before::where('user_id', '=', Auth::user()->id)->first();
			$progress_pic = Progress::where('user_id', '=', Auth::user()->id)->orderBy('id','DESC')->first();
		}else{
			return view("pages.home")
			->with('title',$title)
			->with('allUsers',$allUsers);
		}
		return view("pages.home")
		->with('title',$title)
		->with('before',$before_query)
		->with('progress',$progress_pic)
		->with('allUsers',$allUsers);
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

	public function progress()
	{
		$user_id = Auth::user()->id;
		$progress_pic = Progress::where('user_id', '=', $user_id)->get();
		$before_pic = Before::where('user_id', '=', $user_id)->first();
		return view("pages.progress")
		->with('title', 'Progress')
		->with('progress_pic', $progress_pic)
		->with('before_pic', $before_pic);
	}

	public function motivation()
	{
		$video_query = DB::table('mot_videos')->paginate(3);
		$quote_query = DB::table('mot_images')->paginate(3);
		

		return view("pages.motivation",['video_query' => $video_query],['quote_query' => $quote_query]);
	}

	public function profile($id)
	{
		if (Auth::guest()){
			return Redirect::to('/auth/login');
		}
		$journals = Journal::where('user_id', '=', $id)->where('visible', '=', 1)->first();
		$before_query = Before::where('user_id', '=', $id)->first();
		$user_info = User::find($id);
		$user_gallery = DB::table('gallery_images')->where('user_id',$id)->take(12)->get();
		$data = array('info' => $user_info, 'gallery' => $user_gallery);
		$progress_pic = Progress::where('user_id', '=', $id)->orderBy('id','ASC')->get();
		return view("pages.profile")
			->with('info',$user_info)
			->with('user_gallery',$user_gallery)
			->with('progress_pic',$progress_pic)
			->with('before_pic', $before_query)
			->with('journals', $journals)
			->with('title','Profile of '.Auth::user()->username);
	}

	public function photo_gallery($id)
	{
		$user_gallery = DB::table('gallery_images')->where('user_id',$id)->get();
		$user_info = USER::where('id','=',$id)->first();
		return view("pages.photo_gallery")
		->with('title',"$user_info->username Gallery")
		->with('user_id',$id)
		->with('query', $user_gallery)
		->with('user_info', $user_info);
	}

	public function journal($id)
	{
		$user_info = USER::where('id','=',$id)->first();
		if(Auth::user()->id == $id)
		{
			$user_journal = Journal::where('user_id', '=', $id)
			->orderBy('id','DESC')
			->get();
		}
		else
		{
			$user_journal = Journal::where('user_id', '=', $id)->where('visible', '=', 1)
			->orderBy('id','DESC')
			->get();
		}
		return View::make("pages.journal")
			->with('title', 'Journal')
			->with('user_id', $id)
			->with('journal', $user_journal)
			->with('user_info', $user_info);
	}

}
