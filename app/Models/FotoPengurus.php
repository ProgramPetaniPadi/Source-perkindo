<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotoPengurus extends Model
{
    use HasFactory;
    protected $table = "foto_pengurus";
    protected $fillable = [
        'periode', 'foto'
    ];

    protected $hidden = [];
}
 