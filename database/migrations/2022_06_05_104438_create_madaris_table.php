<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMadarisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('madaris', function (Blueprint $table) {
            $table->id();
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('middlename')->nullable();
            $table->string('extension')->nullable();
            $table->string('gender')->nullable();
            $table->date('birthdate')->nullable();
            $table->string('mother_tongue')->nullable();
            $table->string('ip_community')->nullable();

            $table->string('street')->nullable();
            $table->string('baranggay')->nullable();
            $table->string('district')->nullable();
            $table->string('region')->nullable();
            $table->string('province')->nullable();
            $table->string('city')->nullable();
            $table->string('zip_code')->nullable();

            $table->string('father')->nullable();
            $table->string('mother')->nullable();
            $table->string('guardian')->nullable();
            $table->string('telephone')->nullable();
            $table->string('cellphone')->nullable();
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
        Schema::dropIfExists('madaris');
    }
}
