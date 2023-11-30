<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = "barang";
    public $timestamps = false;
    protected $primaryKey = "id_barang";
    protected $filelabel = ['id_barang', 'nama_barang', 'stok_barang', 'harga_barang', 'deskripsi', 'id_pemasok'];
}
