<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicants extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->increments('app_id');
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
            $table->integer('eval_id')->unsigned();
            $table->foreign('eval_id')->references('eval_id')->on('evaluations');


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
        Schema::dropIfExists('applicants');
    }
}
