<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

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
            $table->unsignedInteger('customer_id');
            $table->integer('intensity');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('survey_id')->references('id')->on('survey');
            $table->foreign('entity_id')->references('id')->on('entity');
            $table->foreign('emotion_id')->references('id')->on('emotion');
            $table->foreign('customer_id')->references('id')->on('customer');
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
        Schema::dropIfExists('result');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
