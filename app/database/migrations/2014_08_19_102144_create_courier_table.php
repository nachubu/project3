<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCourierTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('courier', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('transport_plate_no', 11)->nullable();
			$table->string('name', 100)->nullable();
			$table->string('mobile', 45)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('courier');
	}

}
