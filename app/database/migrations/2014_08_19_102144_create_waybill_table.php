<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWaybillTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('waybill', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('payment_type', 45)->nullable();
			$table->string('date_pickup', 45)->nullable();
			$table->string('date_delivery', 45)->nullable();
			$table->boolean('is_verified', 1);
			$table->integer('service_id')->index('`fk_waybill_service1_idx`');
			$table->string('charge_cost', 45)->nullable();
			$table->string('charge_insurance', 45)->nullable();
			$table->string('charge_other', 45)->nullable();
			$table->string('charge_vat', 45)->nullable();
			$table->string('is_paid', 45)->nullable();
			$table->string('code', 45)->nullable();
			$table->integer('address_sender')->unsigned()->index('`fk_waybill_address1_idx`');
			$table->integer('address_receiver')->unsigned()->index('`fk_waybill_address2_idx`');
			$table->string('receiver_name', 45)->nullable();
			$table->string('receiver_contact', 45)->nullable();
			$table->integer('checklist_id')->unsigned()->nullable()->index('`fk_waybill_checklist1_idx`');
			$table->integer('origin');
			$table->integer('destination');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('waybill');
	}

}
