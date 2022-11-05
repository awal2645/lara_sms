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
            $table->string('stu_name');
            $table->string('stu_email')->unique();
            $table->string('stu_phone');
            $table->string('stu_adm_roll')->unique();
            $table->unsignedInteger('stu_class_id');
            $table->string('stu_birth');
            $table->tinyInteger('stu_age')->nullable();
            $table->string('stu_gender');
            $table->string('stu_blood');
            $table->string('stu_nationality');
            $table->string('stu_address')->nullable();
            $table->string('stu_section');
            $table->string('stu_img')->nullable();
            $table->string('stu_admitted_year')->nullable();
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
