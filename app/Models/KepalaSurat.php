<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KepalaSurat extends Model
{
    use HasFactory;

    protected $table = 'KepalaSurat';
    protected $primaryKey = 'id_kop';

    protected $fillable = [
        'user_id',
        'id_kop',
        'nama_kop',
        'alamat_kop',
        'nama_tujuan',
        
    ];
}
