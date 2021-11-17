<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KelasAjaran extends Model
{
    protected $table = 'kelas_ajaran';
    protected $primaryKey = 'id_kelas_ajaran';
    protected $fillable = ['id_kelas_ajaran','id_pendaftaran','id_kelas','id_tahun_ajaran','nama_kelas_ajaran'];

    public function kelas()
    {
        return $this->belongsTo('App\Models\Kelas', 'id_kelas');
    }
    
    public function biodatasiswa()
    {
        return $this->belongsTo('App\Models\BiodataSiswa', 'id_biodata_siswa');
    }

    public function tahunajaran()
    {
        return $this->belongsTo('App\Models\TahunAjaran', 'id_tahun_ajaran');
    }
}
