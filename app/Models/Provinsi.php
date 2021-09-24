<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    use HasFactory;
    protected $table = "provinsi";
    protected $fillable = [
        'provinsi'
    ];

    protected $hidden = [];
    public function kota_kabupaten()
    {
        return $this->hasMany(KotaKabupaten::class , 'provinsi_id', 'id');
    }

    public function data_prerusahaan()
    {
        return $this->hasMany(DataPerussahaan::class , 'provinsi_id', 'id');
    }
}