<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriDownload extends Model
{
    use HasFactory;
    protected $table = "kategori_downloads";
    protected $fillable = [
        'kategori_download'
    ];

    protected $hidden = [];

    public function download()
    {
        return $this->belongsTo(Download::class , 'kategori_download_id', 'id');
    }
} 