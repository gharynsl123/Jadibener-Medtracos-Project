<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstimateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estimate', function (Blueprint $table) {
            $table->id();
            $table->string('price');
            $table->string('description');
            $table->string('photo');
            $table->string('quantity')->nullable();

            $table->enum('status', ['on-going', 'finsih'])->default('on-going');

            $table->unsignedBigInteger('category_id')->unsigned()->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            
            $table->unsignedBigInteger('id_instansi')->unsigned();
            $table->foreign('id_instansi')->references('id')->on('instansi')->onDelete('cascade');
            
            $table->unsignedBigInteger('equipment_id')->unsigned();
            $table->foreign('equipment_id')->references('id')->on('equipment')->onDelete('cascade');

            $table->unsignedBigInteger('parts_id')->unsigned()->nullable();
            $table->foreign('parts_id')->references('id')->on('parts')->onDelete('cascade');
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
        Schema::dropIfExists('estimate');
    }
}
