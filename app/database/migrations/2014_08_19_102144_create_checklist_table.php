<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateChecklistTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('checklist', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('code', 45)->nullable();
			$table->string('date', 45)->nullable();
			$table->integer('shipment_id')->unsigned()->index('`fk_checklist_shipment1_idx`');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('checklist');
	}

}
