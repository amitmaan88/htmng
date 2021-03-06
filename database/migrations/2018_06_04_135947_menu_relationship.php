<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MenuRelationship extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('menu_relationship', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('menu_id');
            $table->tinyInteger('status');            
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
        Schema::drop('menu_relationship');
    }
}
