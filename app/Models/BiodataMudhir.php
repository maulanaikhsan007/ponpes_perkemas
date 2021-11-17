<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BiodataMudhir extends Model
{
    protected $table = 'biodata_mudhir';
    protected $primaryKey = 'id_biodata_mudhir';
    protected $fillable = ['id_biodata_mudhir','id_kategori_gaji','nama_mudhir','alamat','no_telepon','jenis_kelamin','pendidikan','bidang_ilmu','foto'];

    public function pembayarangaji()
    {
        return $this->hasMany(PembayaranGaji::class);
    }

    public function kategorigaji()
    {
        return $this->belongsTo('App\Models\KategoriGaji', 'id_kategori_gaji');
    }

}
