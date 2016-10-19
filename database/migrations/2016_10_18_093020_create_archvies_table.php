<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArchviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archives', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->unsignedInteger('user_id');
            $table->string('cover')->nullable();
            $table->unsignedInteger('mode')->default(0);
            $table->string('origin')->nullable();
            $table->string('link')->nullable();
            $table->string('abstract')->nullable();
            $table->unsignedInteger('category_id')->nullable();
            $table->unsignedInteger('visit_count')->default(0);
            $table->integer('archive_type_id');
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
        Schema::dropIfExists('archives');
    }
}
