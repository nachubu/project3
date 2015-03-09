<?php

class LoginController extends BaseController {
	public function login(){
		return View::make('login');
	}
	public function dashboard(){
		return View::make('dashboard');
	}
	public function logout(){
		Auth::logout();
		return Redirect::to('/');
	}
	public function validate(){
		$email     = Input::get('email');
		$password  = Input::get('password');
		
		$credt     = array(
						"email"     => $email,
						"password"  => $password
					);		


		if(Auth::attempt($credt)){

			return Redirect::to('home');

		}else{

			return View::make('login');
		}

	}
}