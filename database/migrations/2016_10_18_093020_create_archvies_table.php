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
            $table->unsignedTinyInteger('mode');
            $table->string('origin')->nullable();
            $table->string('link')->nullable();
            $table->string('abstract')->nullable();
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('visit_count')->default(0);
            $table->integer('type');
            $table->string('detail_model')->default('App\Models\Archive\Article');
            $table->string('t_show')->nullable();
            $table->string('t_edit')->nullable();
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
