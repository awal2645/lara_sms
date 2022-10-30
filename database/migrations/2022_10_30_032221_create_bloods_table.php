<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('bloods', function (Blueprint $table) {
            $table->id();
            $table->string('blood_grp');
            $table->timestamps();
        });
        DB::table('bloods')->insert(
            array(
                [
                    'blood_grp' => 'A+',
                ],
                [
                    'blood_grp' => 'A-',
                ],
                [
                    'blood_grp' => 'B+',
                ],
                [
                    'blood_grp' => 'B-',
                ],
                [
                    'blood_grp' => 'O+',
                ],
                [
                    'blood_grp' => 'O-',
                ],
                [
                    'blood_grp' => 'AB+',
                ],
                [
                    'blood_grp' => 'AB-',
                ],
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bloods');
    }
};
