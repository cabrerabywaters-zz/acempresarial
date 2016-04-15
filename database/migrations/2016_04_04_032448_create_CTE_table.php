<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCTETable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ctes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->dateTime('folder_issue_date');
            $table->string('issuer_rut');
            $table->text('address');
            $table->string('tax_category'); 
            $table->timestamps(); 

            $table->foreign('company_id')->references('id')->on('companies')
                    ->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')
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
        Schema::drop('ctes');
    }
}
