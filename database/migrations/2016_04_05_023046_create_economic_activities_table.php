<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEconomicActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('economic_activities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('economic_sector_id')->unsigned();
            $table->string('code');   
            $table->string('name');
            $table->text('description');

            $table->timestamps();

            $table->foreign('economic_sector_id')->references('id')->on('economic_sector')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('economic_activities');
    }
}
