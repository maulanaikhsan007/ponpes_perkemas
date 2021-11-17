<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';
    protected $primaryKey = 'id_kategori';
    protected $fillable = ['id_kategori','jenis_kategori', 'nama_kategori'];

    public function pemasukan()
    {
        return $this->hasMany('App\Pemasukan');
    }

    public function pengeluaran()
    {
        return $this->hasMany('App\Pengeluaran');
    }
}
