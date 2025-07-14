<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('progress', function (Blueprint $table) {
            $table->id();
            
            $table->string('work_value')->nullable();
            $table->text('description')->nullable();
            $table->string('schedule')->nullable();
            $table->string('slug');
            
            $table->unsignedBigInteger('submissions_id')->unsigned();
            $table->foreign('submissions_id')->references('id')->on('submissions')->onDelete('cascade');

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
        Schema::dropIfExists('progress');
    }
}
