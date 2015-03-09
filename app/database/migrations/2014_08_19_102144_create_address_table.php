<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAddressTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('address', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('postalcode', 45)->nullable();
			$table->string('district', 45)->nullable();
			$table->string('telephone', 45)->nullable();
			$table->string('mobile', 45)->nullable();
			$table->string('houseno', 45)->nullable();
			$table->string('street', 45)->nullable();
			$table->string('emailaddress', 45)->nullable();
			$table->integer('region_id')->unsigned()->nullable()->index('`fk_address_region1_idx`');
			$table->string('latitude', 45)->nullable();
			$table->string('longitude', 45)->nullable();
			$table->string('name', 45)->nullable();
			$table->integer('company_id')->index('`fk_address_company1_idx`');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('address');
	}

}
