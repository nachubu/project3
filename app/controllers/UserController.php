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
		$password  = Input::get('password');
		$user  = User::where('email', $email)->count();
		if($user == 1){
			return View::make('users.create')->with('emsg', 'User already exist!');
		}else{
			$u = New User;
			$u->fname = $firstname;
			$u->lname = $lastname;
			$u->email = $email;
			$u->password = Hash::make($password);
			$u->role = $role;
			$u->save();
			return View::make('users.create')->with('msg', 'Successfully added');	

		}
	}
}