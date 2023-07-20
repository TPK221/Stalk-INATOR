<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('reservation', function (Blueprint $table) {
        //     $table->id();
        //     $table->timestamps();
        //     $table->bigInteger('user_id')->unsigned()->nullable();
        //     $table->bigInteger('mission_id');
        //     $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        //     $table->foreign('mission_id')->references('id')->on('missions')->onDelete('cascade');

            
        // });

        // Schema::table('reservation', function (Blueprint $table) {
        //     $table->foreign('mission_id')->references('id')->on('missions')->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservation');
    }
}
