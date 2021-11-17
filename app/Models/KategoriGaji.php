<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriGaji extends Model
{
    use HasFactory;

    protected $table = 'kategori_gaji';
    protected $primaryKey = 'id_kategori_gaji';
    protected $fillable = ['id_kategori_gaji','kategori_gaji','nominal_gaji'];

    public function gaji()
    {
        return $this->hasMany(Gaji::class);
    }

    public function biodatasiswa()
    {
        return $this->hasMany(BiodataSiswa::class);
    }

    public function pembayarangaji()
    {
        return $this->hasMany(PembayaranGaji::class);
    }

}

