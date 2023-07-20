<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsOfStudentProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('reservations_of_student_profile', function (Blueprint $table) {
        //     $table->unsignedBigInteger('reservation_id');
        //     $table->unsignedBigInteger('student_profile_id');

        //     $table->foreign('reservation_id')->references('id')->on('reservations')->onDelete('cascade');
        //     $table->foreign('student_profile_id')->references('id')->on('student_profiles')->onDelete('cascade');

        //     $table->primary(['reservation_id', 'student_profile_id'], 'reservation_student_profile_primary');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations_of_student_profile');
    }
}
