<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SiteDesign extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('site_design', function (Blueprint $table) {
            $table->increments('id');
            $table->string('layout_theme');
            $table->string('folder_path');
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
        Schema::drop('site_design');
    }
}
