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
            $table->string('lastname')->nullable();
            $table->string('firstname')->nullable();
            $table->string('middlename')->nullable();
            $table->string('extension')->nullable();
            $table->string('birthdate')->nullable();
            $table->string('gender')->nullable();
            $table->string('address')->nullable();

            // Learners
            $table->string('image')->nullable(); // profile picture link or something?
            $table->string('marital_status')->nullable(); // checkbox
            $table->string('spouse_name')->nullable();
            $table->string('student_children_num')->nullable();
            $table->boolean('is_orphan')->nullable(); // checkbox
            $table->string('medical_condition')->nullable();
            $table->string('hobby')->nullable();
            $table->string('student_affiliation')->nullable();
            $table->string('blood_type')->nullable();
            $table->integer('brothers_num')->nullable();
            $table->integer('sisters_num')->nullable();
            $table->boolean('is_balik_aral')->nullable(); // checkbox
            $table->boolean('is_4p_beneficiary')->nullable(); // (4Ps) checkbox

            // Parents
            $table->string('parent_affiliation')->nullable(); // MNLF, MILF, Others (specified)
            $table->string('position')->nullable();
            $table->integer('years_of_service')->nullable();
            $table->string('educational_background')->nullable(); // checkbox
            $table->float('monthly_income')->nullable();
            $table->string('source_of_income')->nullable();
            $table->boolean('has_real_property')->nullable(); // checkbox
            $table->boolean('has_personal_property')->nullable(); // checkbox
            $table->boolean('has_house')->nullable(); // checkbox
            $table->string('contact_num')->nullable();
            $table->integer('parent_children_num')->nullable();
            $table->integer('dependents_num')->nullable();
            $table->string('mode_of_transport')->nullable();
            $table->string('business_interest')->nullable();

            // Address
            $table->string('school_distance')->nullable();
            $table->string('peace_condition')->nullable();
            $table->timestamps();




            // $table->string('birth_certificate_no')->nullable();
            // $table->string('learner_reference_number')->nullable();
            // $table->string('ip_community')->nullable();
            // $table->string('mother_tongue')->nullable();
            // $table->string('house_no')->nullable();
            // $table->string('street')->nullable();
            // $table->string('baranggay')->nullable();
            // $table->string('city')->nullable();
            // $table->string('municipality')->nullable();
            // $table->string('province')->nullable();
            // $table->string('country')->nullable();
            // $table->string('zipcode')->nullable();
            // $table->string('father_lastname')->nullable();
            // $table->string('father_firstname')->nullable();
            // $table->string('father_middlename')->nullable();
            // $table->string('father_mobile')->nullable();
            // $table->string('father_phone')->nullable();
            // $table->string('mother_lastname')->nullable();
            // $table->string('mother_firstname')->nullable();
            // $table->string('mother_middlename')->nullable();
            // $table->string('mother_mobile')->nullable();
            // $table->string('mother_phone')->nullable();
            // $table->string('guardian_lastname')->nullable();
            // $table->string('guardian_firstname')->nullable();
            // $table->string('guardian_middlename')->nullable();
            // $table->string('guardian_mobile')->nullable();
            // $table->string('guardian_phone')->nullable();
            // $table->string('last_grade_level_completed')->nullable();
            // $table->string('last_school_year_completed')->nullable();
            // $table->string('school_name')->nullable();
            // $table->string('school_id')->nullable();
            // $table->string('school_address')->nullable();
            // $table->string('semester')->nullable();
            // $table->string('track')->nullable();
            // $table->string('strand')->nullable();
            // $table->string('status')->nullable(); // no LRN, w/ LRN, returning - (0, 1, 2)
            // $table->timestamps();
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
