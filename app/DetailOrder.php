<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model
{
    protected $primaryKey = 'id_detail_order';

    public function food()
    {
        return $this->hasOne('App\Tabel_makanan', 'id_makanan', 'id_makanan');
    }

    public function trasaction()
    {
        return $this->belongsTo('App\Transaksi');
    }
}
