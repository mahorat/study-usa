<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_univer')->nullable();
            $table->integer('id_degree_levels')->nullable();
            $table->string('spec')->nullable();
            $table->integer('id_specialities')->nullable();
            $table->integer('budjet')->nullable();
            $table->integer('price')->nullable();
            $table->integer('duration')->nullable();
            $table->integer('seats')->nullable();
            $table->string('year')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programs');
    }
}
