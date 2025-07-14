<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->string('timetable');
            $table->string('issue');
            $table->string('plan');
            
            $table->unsignedBigInteger('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users');
            
            $table->unsignedBigInteger('equipment_id')->unsigned();
            $table->foreign('equipment_id')->references('id')->on('equipment');
            
            $table->unsignedBigInteger('id_instansi')->unsigned();
            $table->foreign('id_instansi')->references('id')->on('instansi');
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
        Schema::dropIfExists('schedules');
    }
}
