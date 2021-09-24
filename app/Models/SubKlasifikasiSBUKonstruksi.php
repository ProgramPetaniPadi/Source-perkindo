<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubKlasifikasiSBUKonstruksi extends Model
{
    use HasFactory;
    protected $table = "sub_klasifikasi_sbu_konstruksi";
    protected $fillable = [
        'klasifikasi_sbu_konstruksi_id ',
        'kode',
        'sub_klasifikasi',
        'lingkup_pekerjaan',
        'keterangan'
    ];

    protected $hidden = [];

    public function klasifikasi_sbu_konstruksi()
    {
        return $this->belongsTo(KlasifikasiSBUKonstruksi::class , 'klasifikasi_sbu_konstruksi_id ', 'id');
    }
}