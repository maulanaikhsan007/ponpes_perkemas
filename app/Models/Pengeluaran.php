<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    protected $table = 'pengeluaran';
    protected $primaryKey = 'id_pengeluaran';
    protected $fillable = ['id_pengeluaran','id_kategori', 'tanggal' ,'jumlah', 'keterangan'];

    public function kategori()
    {
        return $this->belongsTo('App\Models\Kategori','id_kategori');
    }

}
