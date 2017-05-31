<?php

namespace App\V1\Controllers;

use App\V1\Models\Users;
use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends BaseController{

	var $user;

	public function __construct(){
		$this->user = new Users();
	}

	public function create(Request $request){

		$this->user->fill([
				'name' => $request->input('name'),
				'email' => $request->input('email'),
				'password' => Hash::make($request->input('password')),
				'password_confirmation' => $request->input('password_confirmation'),
			]);
		if($this->user->save()){
			$res['success'] = true;
			$res['result'] = 'Success add user!';
		} else {
			$res['success'] = false;
			$res['result'] = 'Failed add user!';			
		}
		return response($res);
	}

	public function login(Request $request){

		$hasher = app()->make('hash');

		$email = $request->input('email');
		$password = $request->input('password');

		$user = $this->user->where('email', $email)->first();		
		if(!$user){
			$res['success'] = false;
			$res['result'] = "Failed Login!";
			return response($res);		
		} else {
			if(Hash::check($password, $user->password)){
				$res['success'] = true;
				$res['result'] = "Success Login!";
				return response($res);		
			} else {
				$res['success'] = false;
				$res['result'] = "Email or password false!";
				return response($res);		
			}
		}
	}
}