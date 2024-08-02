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
        Schema::create('suratmasuk', function (Blueprint $table) {
            $table->foreignId('id_kop')->constrained('kepala_surat', 'id_kop');
            $table->date('tanggal');
            $table->string('no_surat', 150);
            $table->string('asal_surat', 150);
            $table->string('perihal', 150);
            $table->string('disp1', 70);
            $table->string('disp2', 70);
            $table->foreignId('id_tandatangan')->constrained('namatandatangan', 'id_tandatangan');
            $table->string('image', 60);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suratmasuk');
    }
};
