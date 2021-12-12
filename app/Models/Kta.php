<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kta extends Model
{
    use HasFactory;
    protected $table = "kta";
    protected $fillable = [
        'anggota_id', 'kta_berlaku_sampai', 'file_kta',
        'aktif'
    ];

    protected $hidden = [];

    public function data_perusahaan()
    {
        return $this->belongsTo(DataPerusahaan::class , 'anggota_id', 'id');
    }
}