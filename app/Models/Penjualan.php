<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;
    protected $table = "penjualan";
    public $timestamps = false;
    protected $primaryKey = "id_penjualan";
    protected $filelabel = ['id_penjualan', 'id_barang', 'id_pelanggan', 'total_pemabayaran', 'metode_pembayaran', 'status_pembayaran', 'tanggal'];
}
