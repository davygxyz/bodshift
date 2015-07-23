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
use Mail;
use App\Featured;



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
	public function featured(){
		$data = Request::all();
		Featured::create(array('q1' => $data['q1'], 'q2'=> $data['q2'], 'q3'=> $data['q3'],'q4'=> $data['q4'],'q5'=> $data['q5'], 'q6'=> $data['q6'], 'q7'=> $data['q7'],'q8'=> $data['q8'],'q9'=> $data['q9'],'user_id'=> $data['user_id'],'username'=> $data['username']));
		return Redirect::back();
	}

	public function contactus(){
		$data = Request::all();
		var_dump($data);
		Mail::send('emails.contactus', $data, function($message)
		{
		$message->from(Input::get('email'), Input::get('name'));
	    $message->to('bodshift@bodshift.com');
	    $message->subject('User Contact Form.');

		});

		Session::push('status', 'Email sent successfully!!');
		return Redirect::back();
	}
	
}