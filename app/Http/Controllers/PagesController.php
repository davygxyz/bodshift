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
		$title = "Home";
		return view("pages.home",['title' => $title]);
	}

	public function about()
	{
		$title = "About";
		return view("pages.about",['title' => $title]);
	}

	public function donate()
	{
		$title = "Donate";
		return view("pages.donate",['title' => $title]);
	}

	public function contactus()
	{
		$title = "Contact Us";
		return view("pages.contactus",['title' => $title]);
	}

	public function motivation()
	{
		$title = "Motivation";
		return view("pages.motivation",['title' => $title]);
	}

}
