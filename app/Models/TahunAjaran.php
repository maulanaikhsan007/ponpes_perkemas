<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TahunAjaran extends Model
{
    protected $table = 'tahun_ajaran';
    protected $primaryKey = 'id_tahun_ajaran';
    protected $fillable = ['id_tahun_ajaran','semester','tahun'];

    public function kelasajaran()
    {
        return $this->hasMany(KelasAjaran::class);
    }

    public function pembayaranspp()
    {
        return $this->hasMany(PembayaranSpp::class);
    }

}
