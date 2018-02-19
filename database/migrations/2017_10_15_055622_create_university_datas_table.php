<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUniversityDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('university_datas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->string('university_name')->nullable();
            $table->string('abbreviated')->nullable();
            $table->text('short_description')->nullable();
            $table->integer('id_state')->nullable();
            $table->string('city')->nullable();
            $table->string('street')->nullable();
            $table->string('university_website')->nullable();
            $table->string('emp_fullname')->nullable();
            $table->string('emp_position')->nullable();
            $table->string('emp_email')->nullable();
            $table->string('emp_phone')->nullable();
            $table->string('logo')->nullable();
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
        Schema::dropIfExists('university_datas');
    }
}
