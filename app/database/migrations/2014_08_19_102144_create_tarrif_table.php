<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTarrifTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tarrif', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('origin', 45);
			$table->string('destination', 45);
			$table->integer('cost');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tarrif');
	}

}
