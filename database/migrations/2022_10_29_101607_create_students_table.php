<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('full_name');
            $table->string('email')->unique();
            $table->string('gender');
            $table->string('phone');
            $table->string('birth');
            $table->string('nationality');
            $table->string('img');
            $table->string('blood');
            $table->string('roll')->unique();
            $table->string('session');
            $table->string('section');
            $table->unsignedInteger('class_id');
            $table->tinyInteger('age')->nullable();
            $table->string('admitted_year')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('students');
    }
};
