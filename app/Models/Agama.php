<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agama extends Model
{
    use HasFactory;
    protected $table = "agamas";
    protected $fillable = [
        'agama'
    ];

    protected $hidden = [];
    public function data_pengurus()
    {
        return $this->hasMany(DataPengurus::class , 'agama_id', 'id');
    }
} 