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
            $table->integer('stu_class_id')->unsigned();
            $table->foreign('stu_class_id')->references('id')->on('classes')->onDelete('cascade');
            $table->tinyInteger('stu_age')->nullable();
            $table->string('stu_gender');
            $table->string('stu_blood');
            $table->string('stu_address')->nullable();
            $table->string('stu_section');
            $table->string('class_fees');
            $table->string('discount_ammount');
            $table->string('total_ammount');
            $table->string('stu_parents');
            $table->string('stu_img')->nullable();
            $table->string('stu_admitted_year')->nullable();
            $table->string('stu_pay_date')->nullable();
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