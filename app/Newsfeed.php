<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;
use Eloquent;
use App\Comment;

class Newsfeed extends Eloquent {

	//Table
	protected $table = 'news_feed';

	protected $fillable = ['user_id'];

	 public function comments()
    {
        return $this->hasMany('App\Comment');
    }

}
