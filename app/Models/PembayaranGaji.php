<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class PembayaranGaji extends Model
{
    protected $table = 'pembayaran_gaji';
    protected $primaryKey = 'id_pembayaran_gaji';
    protected $fillable = ['id_pembayaran_gaji','id_kategori_gaji','id_biodata_mudhir','tanggal_pembayaran','bulan'];

    public function getTanggalPembayaranAttribute($value)
    {
        return Carbon::parse($this->attributes['tanggal_pembayaran'])
            ->translatedFormat('d F Y');
    }

    public function gaji()
    {
        return $this->belongsTo('App\Models\Gaji', 'id_gaji');
    }

    public function biodatamudhir()
    {
        return $this->belongsTo('App\Models\BiodataMudhir', 'id_biodata_mudhir');
    }

    public function kategorigaji()
    {
        return $this->belongsTo('App\Models\KategoriGaji', 'id_kategori_gaji');
    }
    
}
