<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnchorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anchors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('room_name');
            $table->string('live_user_id')->unique();
            $table->unsignedInteger('live_id')->references('id')->on('lives');
            $table->string('url');
            $table->string('cover');
            $table->string('avatar');
            $table->unsignedInteger('online');
            $table->string('live_category_id', 20)->references('id')->on('live_categories');
            $table->tinyInteger('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anchors');
    }
}
