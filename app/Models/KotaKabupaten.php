<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KotaKabupaten extends Model
{
    use HasFactory;
    protected $table = "kota_kabupatens";
    protected $fillable = [
        'provinsi_id', 'kota_kabupaten'
    ];

    protected $hidden = [];

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class , 'provinsi_id', 'id');
    }

    public function data_prerusahaan()
    {
        return $this->hasMany(DataPerussahaan::class , 'kota_kabupaten_id', 'id');
    }
}