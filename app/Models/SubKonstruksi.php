<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubKonstruksi extends Model
{
    use HasFactory;
    protected $table = "sbu_konstruksi";
    protected $fillable = [
        'no_seri_formulir ', 'anggota_id ',
        'tanggal_masuk', 'berlaku_sampai', 'registrasi_tahun_ke_2',
        'registrasi_tahun_ke_3', 'tenaga_ahli', 'foto'

    ];

    public function data_perusahaan()
    {
        return $this->belongsTo(DataPerusahaan::class , 'anggota_id', 'id');
    }
}