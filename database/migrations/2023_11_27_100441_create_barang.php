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
        Schema::create('barang', function (Blueprint $table) {
            $table->integer('id_barang')->primary();
            $table->string('nama_barang', 50)->nullable();
            $table->integer('stok_barang')->nullable();
            $table->integer('harga_barang')->nullable();
            $table->string('deskripsi', 100)->nullable();
            $table->integer('id_pemasok');

            $table->foreign('id_pemasok')->references('id_pemasok')->on('pemasok')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};
