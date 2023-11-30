<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;
    protected $table = "pelanggan";
    public $timestamps = false;
    protected $primaryKey = "id_pelanggan";
    protected $filelabel = ['id_pelanggan', 'nama_pelanggan', 'email', 'alamat', 'jenis_kelamin'];
}
