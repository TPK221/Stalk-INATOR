<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMissionsStudentProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('missions_student_profile', function (Blueprint $table) {
            $table->unsignedBigInteger('missions_id');
            $table->unsignedBigInteger('student_profile_id');
            $table->timestamps();

            $table->foreign('missions_id')
                  ->references('id')
                  ->on('missions')
                  ->onDelete('cascade');

            $table->foreign('student_profile_id')
                  ->references('id')
                  ->on('student_profiles')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('missions_student_profile');
    }
}
