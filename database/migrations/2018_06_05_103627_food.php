<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Food extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('foods', function (Blueprint $table) {
            $table->increments('id');            
            $table->string('food_name');
            $table->string('food_type');
            $table->string('food_day');
            $table->integer('hotel_id');
            $table->tinyInteger('status');            
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
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
        Schema::drop('foods');
    }
}
