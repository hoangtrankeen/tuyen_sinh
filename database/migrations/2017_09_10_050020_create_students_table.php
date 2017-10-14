<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id'); 
            $table->string('name');
            $table->date('birth');
            $table->string('address');          
            $table->integer('province_id')->nullable()->unsigned();//important
            $table->foreign('province_id')->references('id')->on('provinces')->onDelete('set null');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('identification')->nullable();

            $table->string('ident_image')->nullable();
            $table->date('date_issue')->nullable();
            $table->string('place_issue')->nullable();

            $table->string('image')->nullable();
            $table->integer('work_place_id')->nullable();
            $table->integer('exam_place_id')->nullable();
            $table->integer('practice_opt')->nullable();
            $table->boolean('payment_status')->nullable();
            $table->integer('expense')->nullable();
            $table->integer('course_id')->nullable()->unsigned();
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('set null');
            $table->integer('status')->nullable();

            $table->integer('created_by')->unsigned()->nullable();
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
        Schema::dropIfExists('students');
        Schema::table('students', function (Blueprint $table) {
            $table->dropForeign(['province_id','course_id']);
            $table->dropColumn(['province_id','course_id']);
        });
    }
}
