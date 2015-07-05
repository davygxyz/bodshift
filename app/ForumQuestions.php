<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;
use Eloquent;

class ForumQuestions extends Eloquent {

	//Table
	protected $table = 'forum_question';

	public static $rules = array('topic' => 'required','detail' => 'required');

	public static function validate($data){
		return Validator::make($data, static::$rules);
	}

	protected $fillable = ['topic', 'detail', 'view','reply','user_id'];

}