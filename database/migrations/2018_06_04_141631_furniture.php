<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Furniture extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('furniture', function (Blueprint $table) {
            $table->increments('id');
            $table->string('room_id');
            $table->string('furniture_type');
            $table->string('furniture_name');
            $table->tinyInteger('status');
            $table->integer('created_by')->nullable();            
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
        Schema::drop('furniture');
    }
}
