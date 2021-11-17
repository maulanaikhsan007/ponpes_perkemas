<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    protected $table = 'pendaftaran';
    protected $primaryKay = 'id_pendaftaran';
    protected $fillable = ['id_pendaftaran','nama_siswa','nama_samaran_siswa','asal_sekolah','nama_ayah','nama_ibu','telp_orang_tua','alamat_orang_tua'];

    public function infak()
    {
        return $this->hasMany(Infak::class);
    }

}
