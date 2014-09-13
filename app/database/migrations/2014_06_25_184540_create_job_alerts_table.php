<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobAlertsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('job_alerts', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('candidate_id');
			$table->integer('job_type');
			$table->integer('sector_id');
			$table->integer('location_id');
			$table->string('salary_expectations');
			$table->string('keywords');
			$table->string('skill_keywords');
			$table->boolean('active');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('job_alerts');
	}

}
