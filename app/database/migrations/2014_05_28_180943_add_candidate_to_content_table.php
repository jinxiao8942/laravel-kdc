<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddCandidateToContentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('content', function(Blueprint $table) {
			$table->string('candidate_facing');
			$table->string('client_facing');
			$table->string('subtype');
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
			$table->dropColumn('candidate_facing');
			$table->dropColumn('client_facing');
			$table->dropColumn('subtype');
		});
	}

}
