<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateF29Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('f29_s', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cte_id')->unsigned();
            $table->string('C03');
            $table->double('C07',16,5);
            $table->datetime('C15');
            $table->double('C020',16,5);
            $table->double('C062',16,5); 
            $table->double('C077',16,5); 
            $table->double('C089',16,5);
            $table->double('C110',16,5);  
            $table->double('C111',16,5); 
            $table->double('C115',16,5); 
            $table->double('C142',16,5); 
            $table->double('C151',16,5); 
            $table->double('C502',16,5); 
            $table->double('C503',16,5); 
            $table->double('C504',16,5);
            $table->double('C509',16,5); 
            $table->double('C510',16,5); 
            $table->double('C511',16,5); 
            $table->double('C514',16,5);
            $table->double('C515',16,5);           
            $table->double('C519',16,5);
            $table->double('C520',16,5);
            $table->double('C525',16,5);
            $table->double('C527',16,5);
            $table->double('C528',16,5);
            $table->double('C532',16,5);
            $table->double('C535',16,5);
            $table->double('C537',16,5);
            $table->double('C538',16,5);
            $table->double('C547',16,5);
            $table->double('C563',16,5);
            $table->double('C573',16,5);
            $table->double('C587',16,5);
            $table->double('C595',16,5);
            $table->double('C598',16,5);          
            
           
            $table->double('C723',16,5);
            $table->double('C724',16,5);
             
            
            
           
            
            
          
            

            
            $table->timestamps();
            
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
        Schema::drop('f29_s');
    }
}
