<?php namespace App\Services;

use App\User;
use Validator;
use Request;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

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
			'about' => 'max:300',
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
		return User::create([
			'name' => $data['name'],
			'email' => $data['email'],
			'password' => bcrypt($data['password']),
			'username' => $data['username'],
			'birthday' => $data['birthday'],
			'weight' => $data['weight'],
			'about' => $data['about'],
			'avatar' => $data['file'],
		]);
	}

}
