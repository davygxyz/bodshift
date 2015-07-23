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
use App\Height;
use Redirect;
use App\Newsfeed;
use App\ForumQuestions;
use App\ForumAnswer;
use App\Featured;
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
		$title = "Welcome";
		$featured = Featured::find(1);
		if (Auth::check()) {
			$before_query = Before::where('user_id', '=', Auth::user()->id)->orderBy('id','DESC')->first();
			$progress_pic = Progress::where('user_id', '=', Auth::user()->id)->orderBy('id','DESC')->first();
		}else{
			return view("pages.home")
			->with('title',$title)
			->with('allUsers',$allUsers)
			->with('featured', $featured);
		}
		return view("pages.home")
		->with('title',$title)
		->with('before',$before_query)
		->with('progress',$progress_pic)
		->with('allUsers',$allUsers)
		->with('featured', $featured);
	}

	public function about()
	{
		$title = "About";
		return view("pages.about",['title' => $title]);
	}

	public function get_featured()
	{
		if (Auth::guest()){
			return Redirect::to('/auth/login')
			->withErrors("Must be logged in to view profile");
		}
		$user_query = User::find(Auth::user()->id);
		$title = "Featured";
		return view("pages.get_featured")
		->with('title',$title)
		->with('user_query', $user_query);
	}

	public function forum()
	{
		if (Auth::guest()){
			return Redirect::to('/auth/login');
		}
		$forum_query = ForumQuestions::orderBy('sticky','DESC')
		->orderBy('id','DESC')
		->paginate(20);
		$title = "Forum";
		return view("pages.forum",['title' => $title])
		->with('forum_query',$forum_query);
	}
	public function your_topics($id){
		if(Auth::user()->id != $id){
			abort(404, 'Unauthorized action.');
		}
		$forum_question_querry = ForumQuestions::where('user_id','=',$id)
		->orderBy('id','DESC')
		->paginate(10);
		return view("pages.your_topics")
		->with('forum_question_querry', $forum_question_querry);
	}
	public function forum_replies($id){
		$forum_answer_querry = ForumAnswer::where('a_user_id','=',$id)
		->orderBy('a_id','DESC')
		->leftJoin('forum_question','forum_answer.question_id','=','forum_question.id')
		->paginate(10);
		return view('pages.forum_replies')
		->with('forum_answer_querry', $forum_answer_querry);
	}

	public function forumView($id){
		DB::table('forum_question')->where('id','=', $id)->increment('view');
		$title = "Forum";
		$forum_query = ForumQuestions::select(DB::raw('*,forum_question.id as forum_id'))
		->where('forum_question.id','=',$id)
		->leftJoin('users','forum_question.user_id','=','users.id')
		->first();

		$answer_query = ForumAnswer::where('question_id','=',$id)
		->leftJoin('users','forum_answer.a_user_id','=','users.id')
		->paginate(10);
		return view("pages.view_topic",['title' => $title])
		->with('forum_query',$forum_query)
		->with('answer_query',$answer_query)
		;

	}
	public function editinfo($id){
		if(Auth::user()->id != $id){
			abort(404, 'Unauthorized action.');
		}
		$user_query = User::find(Auth::user()->id);
		$title = 'Edit Info';
		return view("pages.editinfo")
		->with('title', $title)
		->with('user_query',$user_query);
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
		$before_pic = Before::where('user_id', '=', $user_id)->orderBy('id','DESC')->first();
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
			return Redirect::to('/auth/login')
			->withErrors("Must be logged in to view profile");
		}
		$journals = Journal::where('user_id', '=', $id)->where('visible', '=', 1)->first();
		$before_query = Before::where('user_id', '=', $id)->orderBy('id','DESC')->first();
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

	public function transformations($sex,$slug){

		if($sex == 'M'){
		switch ($slug) {
			case '19 and below':
				$ageOne = 19;
				$ageTwo = 0;
				break;
			case '20 - 30':
				$ageOne = 30;
				$ageTwo = 20;
				break;
			case '30 - 40':
				$ageOne = 40;
				$ageTwo = 30;
				break;
			case '40 +':
				$ageOne = 150;
				$ageTwo = 40;
				break;
			case 'all':
				$ageOne = 200;
				$ageTwo = 0;
				break;
		
		}
		}

		if($sex == 'F'){
		switch ($slug) {
			case '19 and below':
					$ageOne = 19;
					$ageTwo = 0;
					break;
			case '20 - 30':
				$ageOne = 30;
				$ageTwo = 20;
				break;
			case '30 - 40':
				$ageOne = 40;
				$ageTwo = 30;
				break;
			case '40 +':
				$ageOne = 150;
				$ageTwo = 40;
				break;
			case 'all':
				$ageOne = 200;
				$ageTwo = 0;
				break;
			}
		}
			$id_array = array();

			if(isset($ageOne) AND isset($ageTwo)){
				//Select birthday, TIMESTAMPDIFF(year,birthday,CURDATE()) AS NumberOfYears FROM users
				$transCards = DB::table('users')
					->select(DB::raw('*,TIMESTAMPDIFF(year,birthday,CURDATE()) as age'))
					//->where(DB::raw('TIMESTAMPDIFF(year,birthday,CURDATE()) <= 200'))
					//->where(DB::raw('TIMESTAMPDIFF(year,birthday,CURDATE()) >= 0'))
					->whereRaw('TIMESTAMPDIFF(year,birthday,CURDATE()) <='.$ageOne)
					->whereRaw('TIMESTAMPDIFF(year,birthday,CURDATE()) >='.$ageTwo)
					->where('sex','=',$sex)
					->orderByRaw('RAND()')
					->get();
				foreach($transCards as $card) {
					$id_array[] = $card->id;
				}
				$before_array = array();
				$progress_array = array();
				foreach ($id_array as $id) {
					$before = DB::table('before')
					->where('user_id','=',$id)
					->orderBy('id','DESC')
					->limit(1)
					->get();
					$before_array[] = $before;

					$progress = DB::table('progress')
					->where('user_id','=',$id)
					->orderBy('id','DESC')
					->limit(1)
					->get();
					$progress_array[] = $progress;
				}

					
				

			}
			return View::make('pages.transformation')
			->with('title' , 'Transformations')
			->with('transCards', $transCards)
			->with('before', $before_array)
			->with('progress', $progress_array);
		}
}
