<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubNonKonstruksi extends Model
{
    use HasFactory;
    protected $table = "sbu_non_konstruksi";
    protected $fillable = [
        'no_seri_formulir ', 'anggota_id ',
        'tanggal_dikeluarkan_sbu', 'berlaku_sampai', 'pj_operasional', 'foto'

    ];

    public function data_perusahaan()
    {
        return $this->belongsTo(DataPerusahaan::class , 'anggota_id', 'id');
    }
}