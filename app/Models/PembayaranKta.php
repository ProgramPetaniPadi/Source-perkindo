<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembayaranKta extends Model
{
    use HasFactory;
    protected $table = "pembayaran_kta";
    protected $fillable = [
        'anggota_id ', 'rekening_pembayaran_id', 'no_rekening',
        'atas_nama', 'keterangan', 'bukti_pembayaran', 'sudah_dilihat',
        'sudah_diproses'
    ];

    protected $hidden = [];
}