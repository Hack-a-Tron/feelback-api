<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('result', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('survey_id');
            $table->unsignedInteger('entity_id');
            $table->unsignedInteger('emotion_id');
            $table->integer('intensity');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('survey_id')->references('id')->on('survey');
            $table->foreign('entity_id')->references('id')->on('entity');
            $table->foreign('emotion_id')->references('id')->on('emotion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('result');
    }
}
