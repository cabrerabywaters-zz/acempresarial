<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanySegmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_segment', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->double('value', 15, 3);
            $table->double('max_score', 15, 3);
            $table->double('min_score', 15, 3);
                             
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
         Schema::drop('company_segment');
    }
}
