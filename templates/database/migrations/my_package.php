<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create<% model.plural %>Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
      // Create photo table
      Schema::create('<% model.instance.plural %>', function($table) {
        $table->increments('id');

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
      Schema::drop('<% model.instance.plural %>');
	}

}
