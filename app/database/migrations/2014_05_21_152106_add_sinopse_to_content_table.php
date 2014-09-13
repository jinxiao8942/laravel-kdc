<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddSinopseToContentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('content', function(Blueprint $table) {
			$table->text('intro');
			$table->text('description');
			$table->string('keywords');
			$table->datetime('date');
			$table->string('image_alt');
			$table->string('image_text');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('content', function(Blueprint $table) {
			$table->dropColumn('intro');
			$table->dropColumn('description');
			$table->dropColumn('keywords');
			$table->dropColumn('date');
			$table->dropColumn('image_alt');
			$table->dropColumn('image_text');
		});
	}

}
