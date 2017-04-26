<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArchives extends Migration
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
            $table->string('first_name');
            $table->string('last_name');
            $table->string('gender');
            $table->string('nationality');
            $table->date('birth_date');
            $table->string('relagion');
            $table->string('phone');
            $table->string('email');
            $table->string('address');
            $table->string('military');
            $table->integer('years_experience');
            $table->string('university');
            $table->string('faculty');
            $table->string('department');
            $table->integer('gpa');
            $table->integer('graduation_year');
            $table->string('cv');
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
            $table->integer('job_id')->unsigned();
            $table->foreign('job_id')->references('id')->on('jobs');
            $table->date('date');
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
