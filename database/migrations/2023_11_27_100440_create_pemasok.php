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
        Schema::create('pemasok', function (Blueprint $table) {
            $table->integer('id_pemasok')->primary();
            $table->string('nama_pemasok', 50)->nullable();
            $table->string('alamat_pemasok', 50)->nullable();
            $table->string('telepon', 50)->nullable();
            $table->string('jenis_kelamin', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemasok');
    }
};
