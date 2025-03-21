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
        //karena modifikasi dari acara 11 menjadi dibawah itu
        // //acara 9
        // Schema::create('detail_profile', function (Blueprint $table) {
        //     $table->bigIncrements('id');
        //     $table->string('address');
        //     $table->string('nomor_tlp');
        //     $table->date('ttl');
        //     $table->string('foto');
        //     $table->timestamps();
        // });

        //acara 11
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_profile');
    }
};
