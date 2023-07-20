<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submissions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('student_profile_id')->unsigned();
            $table->foreign('student_profile_id')->references('id')->on('student_profiles')->onDelete('cascade');
            /* $table->bigInteger('mission_id')->unsigned();
            $table->foreign('mission_id')->references('id')->on('missions')->onDelete('cascade'); */
            $table->string('submissionFile')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('submissions');
    }
}
