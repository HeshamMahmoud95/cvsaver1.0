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
            $table->increments('eval_id');
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
            $table->boolean('response');
            $table->text('refuse');


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
