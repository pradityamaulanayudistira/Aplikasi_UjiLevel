<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tabel_makanan extends Model
{
    protected $primaryKey = 'id_makanan';
    protected $fillable = ['nama_makanan', 'harga_makanan', 'qty_makanan', 'gambar_makanan'];
}
