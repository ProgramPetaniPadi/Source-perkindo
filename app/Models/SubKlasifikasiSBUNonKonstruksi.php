<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubKlasifikasiSBUNonKonstruksi extends Model
{
    use HasFactory;
    protected $table = "sub_klasifikasi_sbu_Non_konstruksi";
    protected $fillable = [
        'klasifikasi_sbu_non_konstruksi_id ',
        'kode',
        'sub_klasifikasi',
        'lingkup_pekerjaan',
        'keterangan'
    ];

    protected $hidden = [];

    public function klasifikasi_sbu_non_konstruksi()
    {
        return $this->belongsTo(KlasifikasiSBUNonKonstruksi::class , 'klasifikasi_sbu_non_konstruksi_id', 'id');
    }
}