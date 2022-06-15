<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHigherEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('higher_education', function (Blueprint $table) {
            $table->id();
            $table->string('lastname')->nullable();
            $table->string('firstname')->nullable();
            $table->string('middlename')->nullable();
            $table->string('gender')->nullable();
            $table->string('citizenship')->nullable();
            $table->string('religion')->nullable();
            $table->string('civil_status')->nullable();
            $table->date('birthdate')->nullable();
            $table->string('birth_place')->nullable();
            $table->string('contact')->nullable();
            $table->string('permanent_address')->nullable();
            $table->string('current_address')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('status')->nullable(); // transferee, rejoining, degree holder from other schools, others (0 - 3) 
            $table->string('degree_applications')->nullable(); 
            $table->string('highschool_attended')->nullable(); 
            $table->string('school_names')->nullable(); 
            $table->boolean('grades_submitted')->default(false); 
            $table->boolean('enrolled_summer')->default(false); 
            $table->string('disciplinary_actions')->nullable(); 
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
        Schema::dropIfExists('higher_education');
    }
}
