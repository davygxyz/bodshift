<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PagesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$array = ['Lesson 1', 'Lesson 2','Lesson 3'];
		$name = "David Gilliam";
		return view("pages.home",['name' => $name, 'lessons' => $array]);
	}

	public function about()
	{
		return view("pages.about");
	}

}
