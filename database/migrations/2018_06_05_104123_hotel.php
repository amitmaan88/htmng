<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Hotel extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {        
        Schema::create('hotels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hotel_name');
            $table->mediumText('hotel_address')->nullable();
            $table->string('mobile', 15)->nullable();
            $table->string('hotel_photo', 150)->nullable();
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
    public function down() {
        
        Schema::drop('hotels');
    }

}
