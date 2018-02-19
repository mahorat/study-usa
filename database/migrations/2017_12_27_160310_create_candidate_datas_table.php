<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidateDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidate_datas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->nullable();
            $table->string('school_phone')->nullable();
            $table->string('other_contact')->nullable();
            $table->string('year_of_starting')->nullable();
            $table->string('year_of_ending')->nullable();
            $table->string('level_of_english')->nullable();
            $table->string('sponsor')->nullable();
            $table->string('sponsor_name')->nullable();
            $table->string('sponsor_middlename')->nullable();
            $table->string('sponsor_lastname')->nullable();
            $table->string('sponsor_email')->nullable();
            $table->string('sponsor_phone')->nullable();
            $table->string('sponsor_address')->nullable();
            $table->string('sponsor_city')->nullable();
            $table->string('sponsor_region')->nullable();
            $table->string('sponsor_zip')->nullable();
            $table->string('sponsor_country')->nullable();
            $table->string('father_name')->nullable();
            $table->string('father_occupation')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('mather_occupation')->nullable();
            $table->string('indicate_your_family')->nullable();
            $table->string('both_of_my_parents_live_here')->nullable();
            $table->string('parent_address')->nullable();
            $table->string('parent_address2')->nullable();
            $table->string('parent_city')->nullable();
            $table->string('parent_region')->nullable();
            $table->string('parent_zip')->nullable();
            $table->string('parent_country')->nullable();
            $table->string('passport')->nullable();
            $table->string('transcript')->nullable();
            $table->string('diploma')->nullable();
            $table->string('test_score')->nullable();
            $table->string('other_document')->nullable();
            $table->string('other_document2')->nullable();
            $table->string('how_did_you_find_us')->nullable();
            $table->string('comment')->nullable();
            $table->string('who_complated_this_app')->nullable();
            $table->string('full_name_of_the_person')->nullable();

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
        Schema::dropIfExists('candidate_datas');
    }
}
