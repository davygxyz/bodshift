<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;
use Eloquent;

class ForumAnswer extends Eloquent {

	//Table
	protected $table = 'forum_answer';

	public static $rules = array('answer' => 'required');

	public static function validate($data){
		return Validator::make($data, static::$rules);
	}

	protected $fillable = ['question_id', 'a_user_id', 'a_answer'];

}