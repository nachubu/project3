<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateShipmentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('shipment', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('transporter', 45)->nullable();
			$table->string('status', 45)->nullable();
			$table->integer('courier_delivery')->unsigned()->index('`fk_shipment_courier1_idx`');
			$table->integer('courier_pickup')->unsigned()->index('`fk_shipment_courier2_idx`');
			$table->string('weight', 45)->nullable();
			$table->string('box', 45)->nullable();
			$table->string('parcel', 45)->nullable();
			$table->integer('region_id')->unsigned()->index('`fk_shipment_region1_idx`');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('shipment');
	}

}
