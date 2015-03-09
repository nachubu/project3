<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}
	public function showLogin() {
		return View::make('login');
	}
	public function handleLogin() {
		$rules = array(
			'email'    => 'required|email', // make sure the email is an actual email
			'password' => 'required' // password can only be alphanumeric and has to be greater than 3 characters
		);
		$validator = Validator::make(Input::all(), $rules);
		if ($validator->fails()) {
			return Redirect::to('login')->withErrors($validator)->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
		} else {
			$user = User::where('email', '=', Input::get('email'))->where('password', '=', Input::get('password'));
			if ($user->count()>0) {
				Auth::loginUsingId($user->first()->id);
				return Redirect::to('home')->with('flash_notice', 'Successfully logged in.');
			} else {	 	
				return Redirect::to('login')->with('flash_error', 'Your username/password combination was incorrected.');
			}
		}
	}
	public function handleLogout() {
		Auth::logout();
		return Redirect::to('home')->with('flash_notice', 'You have Successfully logged out'); // send back the input (not the password) so that we can repopulate the form
	}

}
