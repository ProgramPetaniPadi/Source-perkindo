<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TentangKami extends Model
{
    use HasFactory;
    protected $table = "tentang_kami";
    protected $fillable = [
        'deskripsi', 'visi', 'misi',
        'sejarah', 'nomor_hp', 'email1',
        'email2', 'map', 'instagram', 'facebook'
    ];

    protected $hidden = [];
}