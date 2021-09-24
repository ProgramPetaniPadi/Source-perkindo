<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beranda1 extends Model
{
    use HasFactory;
    protected $table = "tentang_kami";
    protected $fillable = [
        'deskripsi', 'visi', 'misi', 'sejarah', 'foto'
    ];
    protected $hidden = [];
    public function slide()
    {
        return $this->belongsTo(Slide::class , 'slide', 'id');
    }
}