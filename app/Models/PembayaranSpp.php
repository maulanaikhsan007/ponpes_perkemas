<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class PembayaranSpp extends Model
{
    protected $table = 'pembayaran_spp';
    protected $primaryKey = 'id_pembayaran_spp';
    protected $fillable = ['id_pembayaran_spp','id_biodata_siswa','id_kelas','id_spp','id_tahun_ajaran','tanggal_pembayaran','bulan'];

    public function getTanggalPembayaranAttribute($value)
    {
        return Carbon::parse($this->attributes['tanggal_pembayaran'])
            ->translatedFormat('d F Y');
    }

    public function biodatasiswa()
    {
        return $this->belongsTo('App\Models\BiodataSiswa', 'id_biodata_siswa');
    }

    public function kelas()
    {
        return $this->belongsTo('App\Models\Kelas', 'id_kelas');
    }

    public function spp()
    {
        return $this->belongsTo('App\Models\Spp', 'id_spp');
    }

    public function tahunajaran()
    {
        return $this->belongsTo('App\Models\TahunAjaran', 'id_tahun_ajaran');
    }

}
