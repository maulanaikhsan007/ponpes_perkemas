<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Infak extends Model
{
    protected $table = 'infak';
    protected $primaryKey = 'id_infak';
    protected $fillable = ['id_infak','infak_bangunan','infak_pendaftaran','ekskul'];

    public function pendaftaran()
    {
        return $this->belongsTo('App\Models\Pendaftaran', 'id_pendaftaran');
    }

}
