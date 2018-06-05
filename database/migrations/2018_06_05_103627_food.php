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
        Schema::create('food_menu', function (Blueprint $table) {
            $table->increments('id');            
            $table->string('food_name');
            $table->tinyInteger('food_type');
            $table->tinyInteger('status');
            $table->integer('hotel_id');
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
        //
        Schema::drop('food_menu');
    }
}
