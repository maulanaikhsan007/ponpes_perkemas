<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasukan extends Model
{
    protected $table = 'pemasukan';
    protected $primaryKey = 'id_pemasukan';
    protected $fillable = ['id_pemasukan','id_kategori', 'tanggal' ,'jumlah', 'keterangan'];

    public function kategori()
    {
        return $this->belongsTo('App\Models\Kategori','id_kategori');
    }
}
