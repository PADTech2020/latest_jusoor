<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class SurveyCreateSurveyTable extends Migration
{
    /**
     * Run the migrations.
     *'name',

    'type',

     * @return void
     */



    public function up()
    {
        Schema::create('surveys', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('question', 0);
            $table->string('type', 0)->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->string('option_1', 255)->nullable();
            $table->string('option_2', 255)->nullable();
            $table->string('option_3', 255)->nullable();
            $table->string('option_4', 255)->nullable();
            $table->tinyInteger('home_page_only')->default(0);
            $table->string('status', 60)->default('published');
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
        Schema::dropIfExists('surveys');
    }
}
