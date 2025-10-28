<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking', function (Blueprint $table) {
            $table->id();
            $table->string('date')->nullable();
            $table->string('complaint')->nullable();
            $table->string('action_plan')->nullable();
            $table->string('slug')->nullable();

            $table->string('results')->nullable();
            $table->string('conclusion')->nullable();
            
            $table->enum('status', ['ongoing', 'close'])->default('ongoing');

            $table->unsignedBigInteger('equipment_id')->unsigned();
            $table->foreign('equipment_id')->references('id')->on('equipment')->onDelete('cascade');
            
            $table->unsignedBigInteger('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('id_instansi')->unsigned();
            $table->foreign('id_instansi')->references('id')->on('instansi')->onDelete('cascade');
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
        Schema::dropIfExists('booking');
    }
}
