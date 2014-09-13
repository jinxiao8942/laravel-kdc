<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAddressToCandidateTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('candidate', function(Blueprint $table) {
			$table->dropColumn('address');

			$table->string('address_house_number')->nullable();
			$table->string('address_street')->nullable();
			$table->string('address_address_2')->nullable();
			$table->string('address_county')->nullable();
			$table->string('address_city')->nullable();
			$table->string('address_postcode', 10)->nullable();
			$table->string('address_country')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('candidate', function(Blueprint $table) {
			$table->dropColumn('address_house_number');
			$table->dropColumn('address_street');
			$table->dropColumn('address_address_2');
			$table->dropColumn('address_county');
			$table->dropColumn('address_city');
			$table->dropColumn('address_postcode', 10);
			$table->dropColumn('address_country');

			$table->text('address');
		});
	}

}
