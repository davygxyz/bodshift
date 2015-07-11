<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;
use Eloquent;

class Before extends Eloquent {

	//Table
	protected $table = 'before';

	public static $rules = array('file' => 'required','weight' => 'numeric|max:700|required','fdate'=>'required');

	public static function validate($data){
		return Validator::make($data, static::$rules);
	}

	protected $fillable = ['user_id','file','weight','date'];

}
