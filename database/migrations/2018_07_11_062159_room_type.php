<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RoomType extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('room_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('room_type');
            $table->tinyInteger('bed_no')->unsigned()->default(0);
            $table->decimal('daily_cost', 5, 2)->unsigned()->default(0);
            $table->tinyInteger('status')->default(1);
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
        Schema::drop('room_types');
    }

}
