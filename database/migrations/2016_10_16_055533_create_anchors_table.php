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
            $table->string('id')->primary();
            $table->unsignedInteger('live_id');
            $table->string('name');
            $table->string('room_name');
            $table->string('room_id');
            $table->string('url');
            $table->string('cover');
            $table->string('avatar');
            $table->unsignedInteger('online');
            $table->string('category_id');
            $table->text('live_stream');
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
