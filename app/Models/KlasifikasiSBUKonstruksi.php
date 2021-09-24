<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KlasifikasiSBUKonstruksi extends Model
{
    use HasFactory;
    protected $table = "klasifikasi_sbu_konstruksi";
    protected $fillable = [
        'klasifikasi'
    ];

    protected $hidden = [];
// public function data_pengurus()
// {
//     return $this->belongsTo(DataPengurus::class , 'agama_id', 'id');
// }
}