<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Donatur extends Model
{
    protected $table = 'donatur';
    protected $primaryKey = 'id_donatur';
    protected $fillable = ['id_donatur','nama_donatur','jenis_donatur','nominal','barang','keterangan','tanggal_donatur'];

    public function getTanggalDonaturAttribute($value)
    {
        return Carbon::parse($this->attributes['tanggal_donatur'])
            ->translatedFormat('l, d F Y');
    }
}
