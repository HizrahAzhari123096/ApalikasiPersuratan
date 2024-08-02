<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KepalaSurat extends Model
{
    use HasFactory;

    protected $table = 'kepala_surat';

    protected $primaryKey = 'id_kop';

    protected $fillable = [
        'id_kop',
        'nama_kop',
        'alamat_kop',
        'nama_tujuan',
        'id_user',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}