<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBasicEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('basic_education', function (Blueprint $table) {
            $table->id();
            $table->string('birth_certificate_no')->nullable();
            $table->string('learner_reference_number')->nullable();
            $table->string('lastname')->nullable();
            $table->string('firstname')->nullable();
            $table->string('middlename')->nullable();
            $table->string('extension')->nullable();
            $table->string('birthdate')->nullable();
            $table->string('gender')->nullable();
            $table->string('ip_community')->nullable();
            $table->string('mother_tongue')->nullable();
            $table->string('house_no')->nullable();
            $table->string('street')->nullable();
            $table->string('baranggay')->nullable();
            $table->string('city')->nullable();
            $table->string('municipality')->nullable();
            $table->string('province')->nullable();
            $table->string('country')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('father_lastname')->nullable();
            $table->string('father_firstname')->nullable();
            $table->string('father_middlename')->nullable();
            $table->string('father_mobile')->nullable();
            $table->string('father_phone')->nullable();
            $table->string('mother_lastname')->nullable();
            $table->string('mother_firstname')->nullable();
            $table->string('mother_middlename')->nullable();
            $table->string('mother_mobile')->nullable();
            $table->string('mother_phone')->nullable();
            $table->string('guardian_lastname')->nullable();
            $table->string('guardian_firstname')->nullable();
            $table->string('guardian_middlename')->nullable();
            $table->string('guardian_mobile')->nullable();
            $table->string('guardian_phone')->nullable();
            $table->string('last_grade_level_completed')->nullable();
            $table->string('last_school_year_completed')->nullable();
            $table->string('school_name')->nullable();
            $table->string('school_id')->nullable();
            $table->string('school_address')->nullable();
            $table->string('semester')->nullable();
            $table->string('track')->nullable();
            $table->string('strand')->nullable();
            $table->string('status')->nullable(); // no LRN, w/ LRN, returning - (0, 1, 2)
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
        Schema::dropIfExists('basic_education');
    }
}
