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
        Schema::create('penjualan', function (Blueprint $table) {
            $table->integer('id_penjualan')->primary();
            $table->integer('id_barang');
            $table->integer('id_pelanggan');
            $table->integer('total_pembayaran')->nullable();
            $table->string('metode_pembayaran',50)->nullable();
            $table->string('status_pembayaran',50)->nullable();
            $table->date('tanggal')->nullable();

            $table->foreign('id_barang')->references('id_barang')->on('barang')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_pelanggan')->references('id_pelanggan')->on('pelanggan')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualan');
    }
};
