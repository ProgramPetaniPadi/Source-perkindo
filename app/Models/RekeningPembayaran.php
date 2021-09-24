<?php
 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class RekeningPembayaran extends Model
{
    use HasFactory;
    protected $table = "rekening_pembayarans";
    protected $fillable = [
        'nama_bank','no_rek','atas_nama'
    ];

    protected $hidden = [];
}  