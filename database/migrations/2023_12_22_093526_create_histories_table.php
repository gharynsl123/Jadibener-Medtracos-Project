<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->text('description')->nullable();

            $table->unsignedBigInteger('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('id_progress')->unsigned()->nullable();
            $table->foreign('id_progress')->references('id')->on('progress')->onDelete('cascade');
            
            $table->unsignedBigInteger('estimate_id')->unsigned()->nullable();
            $table->foreign('estimate_id')->references('id')->on('estimate')->onDelete('cascade');

            $table->unsignedBigInteger('submissions_id')->unsigned()->nullable();
            $table->foreign('submissions_id')->references('id')->on('submissions')->onDelete('cascade');

            $table->unsignedBigInteger('equipment_id')->unsigned()->nullable();
            $table->foreign('equipment_id')->references('id')->on('equipment')->onDelete('cascade');
            
            $table->unsignedBigInteger('booking_id')->unsigned()->nullable();
            $table->foreign('booking_id')->references('id')->on('booking')->onDelete('cascade');
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
        Schema::dropIfExists('histories');
    }
}
