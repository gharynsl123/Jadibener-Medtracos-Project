<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('request_part', function (Blueprint $table) {
            $table->id();
            $table->string('part_name');
            $table->string('part_code')->unique();
            $table->string('part_category');
            $table->string('price_part');
            $table->string('name_user');
            $table->string('email_user');
            $table->string('phone_user')->nullable();
            $table->string('part_image')->nullable();
            $table->text('part_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('request_part');
    }
};
