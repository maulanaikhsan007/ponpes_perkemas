<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Spp extends Model
{
    protected $table = 'spp';
    protected $primaryKey = 'id_spp';
    protected $fillable = ['id_spp','spp','start_date','end_date'];

    public function getStartDateAttribute($value)
    {
        return Carbon::parse($this->attributes['start_date'])
            ->translatedFormat('d F Y');
    }

    public function getEndDateAttribute($value)
    {
        return Carbon::parse($this->attributes['end_date'])
            ->translatedFormat('d F Y');
    }

    public function pembayaranspp()
    {
        return $this->hasMany(PembayaranSpp::class);
    }

}
