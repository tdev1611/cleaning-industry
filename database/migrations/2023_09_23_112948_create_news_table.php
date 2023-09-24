<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->unsignedBigInteger('category_new_id');      
            $table->longText('content');
            $table->text('image');
            $table->tinyInteger('ordinal')->nullable();
            $table->tinyInteger('status')->comment('1: Hiển thị ; 2: Ẩn');
            $table->timestamps();
            $table->foreign('category_new_id')->references('id')->on('category_news')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
