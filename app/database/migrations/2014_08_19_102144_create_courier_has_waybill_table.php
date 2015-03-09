<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCourierHasWaybillTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('courier_has_waybill', function(Blueprint $table)
		{
			$table->integer('courier_id')->unsigned()->index('`fk_courier_has_waybill_courier1_idx`');
			$table->integer('waybill_id')->unsigned()->index('`fk_courier_has_waybill_waybill1_idx`');
			$table->string('date', 45)->nullable();
			$table->string('type', 45)->nullable();
			$table->string('reasons', 45)->nullable();
			$table->string('quantity', 45)->nullable();
			$table->primary(['courier_id','waybill_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('courier_has_waybill');
	}

}
