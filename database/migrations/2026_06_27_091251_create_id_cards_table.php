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
    Schema::create('id_cards', function (Blueprint $table) {

        $table->id();

        $table->date('tanggal');

        $table->string('status');

        $table->string('lokasi');

        $table->string('np');

        $table->string('nama');

        $table->string('nomor_nota');

        $table->string('operator');

        $table->integer('gagal_cetak')->default(0);

        $table->timestamps();

    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('id_cards');
    }
};
