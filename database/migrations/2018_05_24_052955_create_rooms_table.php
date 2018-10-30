<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('room_name');
            $table->tinyInteger('room_type');
            $table->tinyInteger('chair_no')->unsigned()->default(0);
            $table->tinyInteger('table_no')->unsigned()->default(0);
            $table->tinyInteger('bed_no')->unsigned()->default(0);
            $table->tinyInteger('floor_no')->unsigned()->default(0);
            $table->decimal('room_size', 5, 2)->unsigned()->default(0);
            $table->decimal('daily_cost', 5, 2)->unsigned()->default(0);
            $table->decimal('monthly_cost', 5, 2)->unsigned()->default(0);
            $table->decimal('yearly_cost', 5, 2)->unsigned()->default(0);
            $table->text('description')->nullable();
            $table->integer('hotel_id')->unsigned()->default(0);
            $table->integer('user_id')->unsigned()->default(0);
            $table->string('room_photo', 150)->nullable();
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
        Schema::drop('rooms');
    }

}
