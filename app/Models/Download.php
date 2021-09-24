<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    use HasFactory;
    protected $table = "downloads";
    protected $fillable = [
        'kategori_download_id', 'dokumen','judul',
    ];

    protected $hidden = [];
} 