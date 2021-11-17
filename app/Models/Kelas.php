<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Kelas extends Model
{
    protected $table = 'kelas';
    protected $primaryKey = 'id_kelas';
    protected $fillable = ['id_kelas','kelas','nama_kelas'];

    public function kelasajaran()
    {
        return $this->hasMany(KelasAjaran::class);
    }

    public function pembayaranspp()
    {
        return $this->hasMany(PembayaranSpp::class);
    }

    public function biodatasiswa()
    {
        return $this->hasMany(BiodataSiswa::class);
    }
}
