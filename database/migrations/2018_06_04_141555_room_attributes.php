<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RoomAttributes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('room_attrib', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('room_id');
            $table->string('attributes');
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
        Schema::drop('room_attrib');
    }
}
