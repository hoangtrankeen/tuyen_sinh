<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id')->unsigned();
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->string('test_point');
            $table->string('practice_point');  
            $table->string('cer_code');     //so hieu
            $table->string('issue_code');   //so vao so cap chung chi
            $table->dateTime('date_issue'); //ngay cap
            $table->integer('courses_id');
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
        Schema::dropIfExists('certificates');
        Schema::table('certificates', function (Blueprint $table) {
            $table->dropForeign(['student_id']);

        });
    }
}
