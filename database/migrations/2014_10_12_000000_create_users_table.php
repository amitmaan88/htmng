<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->mediumText('address')->nullable();
            $table->tinyInteger('user_type_id')->unsigned()->default(0);
            $table->integer('hotel_id')->unsigned()->default(0);
            $table->string('mobile',15)->nullable();
            $table->string('landline',15)->nullable();
            $table->string('user_photo',150)->nullable();
            $table->string('user_id_photo',150)->nullable();
            $table->tinyInteger('status')->default(1);
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('users');
    }

}
