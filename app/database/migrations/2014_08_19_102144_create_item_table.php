<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateItemTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('item', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('description', 45)->nullable();
			$table->string('quantity', 45)->nullable();
			$table->string('packing', 45)->nullable();
			$table->string('weight', 45)->nullable();
			$table->string('dimension_height', 45)->nullable();
			$table->string('dimension_width', 45)->nullable();
			$table->string('dimension_length', 45)->nullable();
			$table->string('pieces', 45)->nullable();
			$table->integer('waybill_id')->unsigned()->index('`fk_package_waybill1_idx`');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('item');
	}

}
