<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KlasifikasiSBUNonKonstruksi extends Model
{
    use HasFactory;
    protected $table = "klasifikasi_sbu_non_konstruksi";
    protected $fillable = [
        'klasifikasi'
    ];

    protected $hidden = [];
}