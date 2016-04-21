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
        Schema::create('f22_s', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cte_id')->unsigned();
            $table->string('rut');
            $table->string('email');
            $table->string('folio');
            $table->datetime('tax_year');
            $table->double('C20', 16, 5);            
            $table->double('C18',16,5);
            $table->double('C122',16,5);
            $table->double('C123',16,5);
            $table->double('C628',16,5);
            $table->double('C630',16,5);
            $table->double('C631',16,5);
            $table->double('C632',16,5);
            $table->double('C635',16,5);
            $table->double('C637',16,5);
            $table->double('C638',16,5);
            $table->double('C643',16,5);
            $table->double('C645',16,5);
            $table->double('C647',16,5);
            $table->double('C366',16,5);
            $table->double('C629',16,5);
            $table->double('C633',16,5);
            $table->double('C82',16,5);
            $table->double('C839',16,5);
            $table->double('C893',16,5);
            $table->double('C894',16,5);
            $table->double('C651',16,5);            

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
        Schema::drop('f22_s');
    }
}
