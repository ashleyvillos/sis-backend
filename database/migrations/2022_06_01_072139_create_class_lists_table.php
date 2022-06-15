<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_lists', function (Blueprint $table) {
            $table->id();
            $table->integer('subject_id');
            $table->integer('room_id');
            $table->integer('teacher_id');
            $table->dateTime('from')->nullable();
            $table->dateTime('to')->nullable();
            $table->integer('term_id');
            $table->integer('sy');
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
        Schema::dropIfExists('class_lists');
    }
}
