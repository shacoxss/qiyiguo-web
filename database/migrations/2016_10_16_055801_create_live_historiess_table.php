<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLiveHistoriessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anchor_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('anchor_id')->references('id')->on('anchors');
            $table->string('live_category_id', 20)->references('id')->on('live_categories');
            $table->unsignedInteger('live_id')->references('id')->on('lives');
            $table->string('room_name');
            $table->unsignedInteger('online');
            $table->dateTime('time');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('live_histories');
    }
}
