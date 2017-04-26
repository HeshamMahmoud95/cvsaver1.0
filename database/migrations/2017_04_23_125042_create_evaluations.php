<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluations', function (Blueprint $table) {
            $table->increments('id');
            $table->text('cv_notes');
            $table->boolean('cv_result');
            $table->integer('english');
            $table->integer('iq');
            $table->integer('technical');
            $table->boolean('exam_result');
            $table->text('interview_notes');
            $table->boolean('interview_result');
            $table->integer('degree');
            $table->text('offer');
            $table->string('response',1);
            $table->text('refuse');
            $table->integer('app_id')->unsigned();
            $table->foreign('app_id')->references('id')->on('applicants');



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
        Schema::dropIfExists('evaluations');
    }
}
