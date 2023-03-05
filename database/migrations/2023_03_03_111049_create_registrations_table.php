<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->string("full_name")->nullable();
            $table->string("email")->nullable();
            $table->string("phone_number")->nullable();
            $table->enum(
                "category",
                [
                    "Student",
                    "Other"
                ]
            )->nullable();
            $table->string("profession")->nullable(); // if it is not student

            $table->enum(
                "programing_level",
                [
                    "Beginner",
                    "Medium",
                    "Professional"
                ]
            )->nullable();
            $table->string("workshops")->nullable();
            $table->string("is_accepted")->nullable();
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
        Schema::dropIfExists('registrations');
    }
}
