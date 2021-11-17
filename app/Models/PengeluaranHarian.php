<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class PengeluaranHarian extends Model
{
    protected $table = 'pengeluaran_harian';
    protected $primaryKey = 'id_pengeluaran_harian';
    protected $guarded = ['status','nama_penginfak'];

    public function getTanggalPengeluaranAttribute($value)
    {
        return Carbon::parse($this->attributes['tanggal_pengeluaran'])
            ->translatedFormat('d F Y');
    }

    public function jenispengeluaran()
    {
        return $this->belongsTo('App\Models\JenisPengeluaran', 'id_jenis_pengeluaran');
    }

}
