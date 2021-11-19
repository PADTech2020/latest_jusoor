<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class ResearchersCreateResearchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('researchers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 120);
            $table->string('position', 120);
            $table->string('type', 120);
            $table->text('summery');
            $table->string('image', 255);
            $table->string('phone', 120);
            $table->string('email', 120);
            $table->string('facebook', 255);
            $table->string('twitter', 255);
            $table->string('instagram', 255);
            $table->tinyInteger('status')->unsigned()->default(1);

            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('researchers');
    }
}
