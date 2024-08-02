<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    use HasFactory;

    protected $table = 'suratkeluar';

    protected $fillable = [
        'id_kop',
        'tanggal',
        'no_surat',
        'perihal',
        'tujuan',
        'isi_surat',
        'id_tandatangan',
        'id_user',
    ];

    public function kepalaSurat()
    {
        return $this->belongsTo(KepalaSurat::class, 'id_kop', 'id_kop');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function namatandatangan()
    {
        return $this->belongsTo(NamaTandaTangan::class, 'id_tandatangan', 'id_tandatangan');
    }
}
