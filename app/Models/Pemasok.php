<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasok extends Model
{
    use HasFactory;
    protected $table = "pemasok";
    public $timestamps = false;
    protected $primaryKey = "id_pemasok";
    protected $filelabel = ['id_pemasok', 'nama_pemasok', 'alamat_pemasok', 'telepon', 'jenis_kelamin'];
}
