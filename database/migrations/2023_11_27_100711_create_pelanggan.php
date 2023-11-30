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
        Schema::create('pelanggan', function (Blueprint $table) {
            $table->integer('id_pelanggan')->primary();
            $table->string('nama_pelanggan', 50)->nullable();
            $table->string('email', 50)->nullable();
            $table->string('alamat', 50)->nullable();
            $table->string('jenis_kelamin', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelanggan');
    }
};
