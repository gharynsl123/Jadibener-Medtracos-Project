<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('phone_number')->nullable();
            $table->string('password');
            $table->string('last_seen')->nullable();
            
            $table->string('pass_view');
            $table->string('slug')->unique();
            
            $table->timestamp('email_verified_at')->nullable();
            
            $table->enum('departement', ['Hospital Kitchen', 'CSSD', 'Purcashing', 'IPS-RS'])->nullable()->default(null);
            $table->enum('gender', ['laki-laki', 'perempuan'])->nullable()->default(null);
            $table->enum('level', ['admin', 'pic', 'sub_service', 'teknisi', 'surveyor'])->default('admin');
            $table->enum('role', ['kap_teknisi'])->nullable()->default(null);

            $table->unsignedBigInteger('id_instansi')->unsigned()->nullable();
            $table->foreign('id_instansi')->references('id')->on('instansi')->onDelete('cascade');

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
