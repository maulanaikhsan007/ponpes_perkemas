<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
    protected $table = 'gaji';
    protected $primaryKey = 'id_gaji';
    protected $guarded = [];

    public function kategorigaji()
    {
        return $this->belongsTo('App\Models\KategoriGaji', 'id_kategori_gaji');
    }

    public function pembayarangaji()
    {
        return $this->hasMany(PembayaranGaji::class);
    }

}
