<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('url')->unique();
            $table->string('pinyin');
            $table->char('background_color', 8)->defualt('normal');
            $table->string('logo')->nullable();
            $table->char('type', 20)->defualt('normal');
            $table->decimal('weight', 10, 5)->defualt(0);
            $table->string('notice')->nullable();
            $table->string('template')->nullable();
            $table->string('anchor_name')->nullable();
            $table->string('platform_name')->nullable();
            $table->string('link')->nullable();
            $table->string('keywords')->nullable();
            $table->string('description')->nullable();
            $table->string('background_image')->nullable();
            $table->unsignedInteger('baidu_index')->nullable();
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
        Schema::dropIfExists('tags');
    }
}
