<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPerusahaan extends Model
{
    use HasFactory;
    protected $table = "anggota";
    protected $fillable = [
        'nomor_keanggotaan', 'nama_perusahaan', 'nama_penanggung_jawab',
        'alamat_perusahaan', 'provinsi_id', 'kota_kabupaten_id',
        'telepon_telex_fax', 'no_hp_1', 'no_hp_2', 'password',
        'email', 'logo'
    ];

    protected $hidden = [];

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class , 'provinsi_id', 'id');
    }

    public function kota_kabupaten()
    {
        return $this->belongsTo(KotaKabupaten::class , 'kota_kabupaten_id', 'id');
    }

    public function sub_konstruksi()
    {
        return $this->hasMany(SubKonstruksi::class , 'anggota_id', 'id');
    }

}