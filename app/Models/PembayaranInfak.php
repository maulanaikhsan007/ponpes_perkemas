<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class PembayaranInfak extends Model
{
    protected $table = 'pembayaran_infak';
    protected $primaryKey = 'id_pembayaran_infak';
    protected $fillable = ['id_pembayaran_infak','id_biodata_siswa','infak_bangunan','infak_pendaftaran', 'infak_ekskul', 'tanggal_pembayaran'];

    public function getTanggalPembayaranAttribute($value)
    {
        return Carbon::parse($this->attributes['tanggal_pembayaran'])
            ->translatedFormat('l, d F Y');
    }
    public function biodatasiswa()
    {
        return $this->belongsTo('App\Models\BiodataSiswa', 'id_biodata_siswa');
    }

    
}
