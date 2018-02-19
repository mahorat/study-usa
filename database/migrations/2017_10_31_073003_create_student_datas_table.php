<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_datas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user');
            $table->string('name');
            $table->string('surname');
            $table->string('middlename')->nullable();
            $table->integer('place_of_the_birth');
            $table->integer('month');
            $table->integer('day');
            $table->integer('year');
            $table->integer('gender');
            $table->integer('citizenship');
            $table->integer('per_country');
            $table->string('postal_code');
            $table->string('region');
            $table->string('city');
            $table->string('address');
            $table->string('email');
            $table->string('phone_number');
            $table->integer('id_level');
            $table->string('name_of_the_string');
            $table->integer('school_location');
            $table->string('school_city');
            $table->string('school_street');
            $table->string('year_of_ending');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_datas');
    }
}
