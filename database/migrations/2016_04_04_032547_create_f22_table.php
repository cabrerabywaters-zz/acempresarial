<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateF22Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('f22s', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cte_id')->unsigned();           
            $table->string('rut');
            $table->text('address');
            $table->string('tax_category');  

            $table->foreign('cte_id')->references('id')->on('ctes')
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
        //
    }
}
