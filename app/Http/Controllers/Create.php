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
use App\ForumQuestions;
use App\ForumAnswer;



class Create extends Controller {
	public function createForum(){
		$data = Request::all();
		$validation = ForumQuestions::validate($data);
		if ($validation->fails())
		{
		 	return redirect()->back()->withErrors($validation->errors());
		}

		ForumQuestions::create(array('topic' => $data['topic'],'user_id' => $data['user_id'],'detail' => $data['detail']));
	    return Redirect::back();
	}

	public function answer(){
		$data = Request::all();
		$validation = ForumAnswer::validate($data);
		if ($validation->fails())
		{
		 	return redirect()->back()->withErrors($validation->errors());
		}
		ForumAnswer::create(array('question_id' => $data['question_id'],'a_user_id' => $data['user_id'],'a_answer' => $data['answer']));
		DB::table('forum_question')->where('id','=', $data['question_id'])->increment('reply');

	    return Redirect::back();
	}
	
}