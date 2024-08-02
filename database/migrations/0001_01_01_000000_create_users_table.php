<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id_user'); // Kolom ID dengan nama 'id_user' sebagai primary key
            $table->string('user_name', 50);
            $table->string('password', 150);
            $table->string('status', 50);
            $table->string('nama_petugas', 100);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};