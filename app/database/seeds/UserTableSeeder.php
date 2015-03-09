<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder {

	public function run()
	{

			DB::table('user')->delete();

			User::create(
					array("email"=>'user1@cds.com', "password"=>Hash::make('1234'), "role" => 'receiver')
				);
			User::create(
					array("email"=>'user2@cds.com', "password"=>Hash::make('1234'), "role" => 'approver')
				);
			User::create(
					array("email"=>'admin@cds.com', "password"=>Hash::make('1234'), "role" => 'admin')
				);

	}

}