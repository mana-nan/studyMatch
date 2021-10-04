<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMypagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mypages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image_path');//画像
            $table->string('userName');//ユーザー名
            $table->string('university');//大学
            $table->string('faculty');//学部
            $table->string('introduction');//自己紹介
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
        Schema::dropIfExists('mypages');
    }
}
