<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;
use Eloquent;

class Journal extends Eloquent {

	//Table
	protected $table = 'journal';

	public static $rules = array('name' => 'required|max:255','content' => 'required');

	public static function validate($data){
		return Validator::make($data, static::$rules);
	}

	protected $fillable = ['name', 'content', 'user_id','visible'];

}
