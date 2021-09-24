<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;
    protected $table = "jabatans";
    protected $fillable = [
        'jabatan'
    ];

    protected $hidden = [];
    public function data_pengurus()
    {
        return $this->hasMany(DataPengurus::class , 'jabatan_id', 'id');
    }
}