<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;
use Eloquent;

class Comment extends Eloquent {

	//Table
	protected $table = 'comment';

	public static $rules = array('feedpost' => 'required');

	public static function validate($data){
		return Validator::make($data, static::$rules);
	}

	protected $fillable = ['sending_id','receiving_id','comment','newsfeed_id'];

}
