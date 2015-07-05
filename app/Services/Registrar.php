<?php namespace App\Services;

use App\User;
use Validator;
use Request;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;
use Auth;
use App\Height;

class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		return Validator::make($data, [
			'name' => 'required|max:255',
			'email' => 'required|email|max:255|unique:users|confirmed',
			'password' => 'required|confirmed|min:6',
			'username' => 'required|max:255|unique:users',
			'birthday' => 'required',
			'weight' => 'required|max:3',
			'about' => 'max:500',
			'sex' => 'required',
			'file' => 'max:10000|mimes:jpeg,png,gif,jpg'
		]);
	}


	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */

	public function create(array $data)
	{

		$file = Request::file('file');
		$destinationPath = public_path().'/uploads/user/profile_pic';
		// If the uploads fail due to file system, you can try doing public_path().'/uploads' 
		$filename = str_random(12);
		//$filename = $file->getClientOriginalName();
		//$extension =$file->getClientOriginalExtension(); 
		$user_id = Auth::id();
		$upload_success = Request::file('file')->move($destinationPath, $filename);

		if( $upload_success ){
			return User::create([
				'name' => $data['name'],
				'email' => $data['email'],
				'password' => bcrypt($data['password']),
				'username' => $data['username'],
				'birthday' => $data['birthday'],
				'weight' => $data['weight'],
				'about' => $data['about'],
				'avatar' => $filename,
				'ft' => $data['ft'],
				'inch' => $data['inch'],
				'sex' =>$data['sex']
			]);
		}else{
			return redirect()->back()->withErrors($validation->errors());
		}
	}

}
