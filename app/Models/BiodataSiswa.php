<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BiodataSiswa extends Model
{
    protected $table = 'biodata_siswa';
    protected $primaryKey = 'id_biodata_siswa';
    protected $fillable = ['id_biodata_siswa','NIS','nama_siswa','nama_samaran_siswa','jenis_kelamin','asal_sekolah','nama_ayah','nama_ibu','telp_orang_tua','alamat_orang_tua','nisn','id_kelas','user_id','foto'];

    public function kelasajaran()
    {
        return $this->hasMany(KelasAjaran::class);
    }
   
    public function pembayaranspp()
    {
        return $this->hasMany(PembayaranSpp::class);
    }

    public function pembayaraninfak()
    {
        return $this->hasMany(PembayaranInfak::class);
    }
     public function kelas()
    {
        return $this->belongsTo('App\Models\Kelas', 'id_kelas');
    }

}
