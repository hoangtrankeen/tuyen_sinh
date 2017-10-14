<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoticesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('body');
            $table->integer('type'); //1:thong bao 2:cham soc khach hang
            $table->integer('course_id')->unsigned();
            $table->foreign('course_id')->references('id')->on('courses');
            
            $table->integer('created_by');
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
        Schema::dropIfExists('notices');
        Schema::table('notices', function (Blueprint $table) {
            $table->dropForeign(['course_id']);
        });
    }
}
