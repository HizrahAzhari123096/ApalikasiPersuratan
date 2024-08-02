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
        Schema::create('suratkeluar', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_kop')->constrained('kepala_surat', 'id_kop');
            $table->date('tanggal');
            $table->string('no_surat', 200);
            $table->string('perihal', 150);
            $table->string('tujuan', 50);
            $table->text('isi_surat');
            $table->foreignId('id_tandatangan')->constrained('namatandatangan', 'id_tandatangan');
            $table->foreignId('id_user')->constrained('users', 'id_user');
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
        Schema::dropIfExists('suratkeluar');
    }
};