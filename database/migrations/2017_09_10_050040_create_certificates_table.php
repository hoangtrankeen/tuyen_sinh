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
            $table->string('multi_choice');//trac nghiem
            $table->string('practice');  //thuc hanh
            $table->string('cer_code')->unique();     //so hieu
            $table->string('issue_code')->unique();   //so vao so cap chung chi
            $table->date('date_issue'); //ngay cap
            $table->integer('course_id')->references('id')->on('courses')->onDelete('set null');
            $table->integer('created_by');
            $table->boolean('status')->nullable();
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
