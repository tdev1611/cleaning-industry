<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingWebsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting_webs', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('name:website');
            $table->string('title')->comment('title:index');
            $table->string('logo')->comment('logo');
            $table->string('meta_title')->comment('meta');
            $table->text('meta_desc')->comment('description');
            $table->string('keyword')->comment('content');
            $table->string('og_url')->comment('link');
            $table->tinyInteger('status');
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
        Schema::dropIfExists('setting_webs');
    }
}
