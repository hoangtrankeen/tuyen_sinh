<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('category_id')->nullable()->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');

            $table->integer('post_id')->nullable()->unsigned();
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('set null');

            $table->string('url')->nullable();
            $table->string('slug');
            $table->boolean('status');
            $table->integer('parent_id')->nullable();
            $table->integer('order');
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
        Schema::dropIfExists('menus');
        Schema::table('menus', function (Blueprint $table) {
            $table->dropForeign(['category_id','post_id']);
           
        });
    }
}
