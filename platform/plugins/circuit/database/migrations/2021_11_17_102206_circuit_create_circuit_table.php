<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CircuitCreateCircuitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('circuits', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('desc', 500);
            $table->integer('parent_id');
            $table->tinyInteger('is_default')->unsigned()->default(0);
            $table->tinyInteger('order')->default(0);
            $table->string('status', 60)->default('published');
            $table->timestamps();
        });

        Schema::create('post_circuits', function (Blueprint $table) {
            $table->id();
            $table->integer('circuit_id')->unsigned()->references('id')->on('circuits')->onDelete('cascade');
            $table->integer('post_id')->unsigned()->references('id')->on('posts')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('circuits');
        Schema::dropIfExists('post_circuits');
    }
}
