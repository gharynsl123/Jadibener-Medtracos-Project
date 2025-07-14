<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivityLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_log', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unsigned(); 
            $table->unsignedBigInteger('model_id')->unsigned(); 

            $table->string('action'); // 'created', 'updated', 'deleted'
            $table->string('model');  // Nama model yang berubah
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->json('changes')->nullable();    // Detil perubahan data (json)
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
        Schema::dropIfExists('activity_log');
    }
}
