<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateEntityToSurveyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entity_to_survey', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('survey_id');
            $table->unsignedInteger('entity_id');
            $table->integer('order');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('survey_id')->references('id')->on('survey');
            $table->foreign('entity_id')->references('id')->on('entity');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::dropIfExists('entity_to_survey');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
