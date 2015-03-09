<?php 

class UserController extends BaseController{
	public function create(){
		return View::make('users.create');
	}
	public function store(){
		$firstname = Input::get('firstname');
		$lastname  = Input::get('lastname');
		$email     = Input::get('email');
		$role      = Input::get('role');

		$user  = User::where('firstname', $firstname)->count();
		if($user == 1){
			return View::make('users.create')->with('emsg', 'User already exist!');
		}else{
			$usr = User::create(array(
					"firstname" => $firstname,
					"lastname"  => $lastname,
					"email"     => $email,
					"password"  => Hash::make('1234'),
					"role"      => $role
				));
			return View::make('users.create')->with('msg', 'Successfully added');	

		}
	}
}