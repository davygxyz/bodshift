<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;
use Eloquent;

class Featured extends Eloquent {

	//Table
	protected $table = 'featured_usr';


	protected $fillable = ['q1', 'q2', 'q3','q4','q5', 'q6', 'q7','q8','q9','user_id','username'];

}