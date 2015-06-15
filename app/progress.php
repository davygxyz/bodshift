<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;
use Eloquent;

class Progress extends Eloquent {

	//Table
	protected $table = 'progress';

	public static $rules = array('file' => 'required','weight' => 'numeric|max:700|required');

	public static function validate($data){
		return Validator::make($data, static::$rules);
	}

	protected $fillable = ['file','user_id','weight'];

}
