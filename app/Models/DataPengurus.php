<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class DataPengurus extends Model
{
    use HasFactory;
    protected $table = "pengurus";
    protected $fillable = [
        'nik', 'nama', 'no_ktp', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'agama_id', 'alamat', 'no_hp_1'
        , 'no_hp_2', 'jabatan_id', 'email', 'foto',
    ];

    protected $hidden = [];

    public function agamas()
    {
        return $this->belongsTo(Agama::class , 'agama_id', 'id');
    }
    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class , 'jabatan_id', 'id');
    }
}