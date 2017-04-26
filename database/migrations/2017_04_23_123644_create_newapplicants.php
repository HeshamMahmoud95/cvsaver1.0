<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewapplicants extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->increments('id');

            $table->string('first');
            $table->string('last');
            $table->string('gender');
            $table->string('nation');
            $table->date('bod');        //birth of date
            $table->string('religion');
            $table->string('phone');
            $table->string('email');
            $table->string('address');
            $table->string('military');
            $table->integer('yoe');     //years of experience
            $table->string('university');
            $table->string('faculty');
            $table->string('department');
            $table->string('gpa');
            $table->integer('graduation_year');
            $table->string('cv');




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
