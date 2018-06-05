<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserMailLog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('user_mail_log', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');            
            $table->integer('log_mesg');            
            $table->tinyInteger('sent_status');
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
        Schema::drop('user_mail_log');
    }
}
