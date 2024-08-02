<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NamaTandaTangan extends Model
{
    use HasFactory;

    protected $table = 'namatandatangan';
    protected $primaryKey = 'id_tandatangan';

    protected $fillable = [
        'id_tandatangan',
        'nama_tandatangan',
        'jabatan',
        'nip',
    ];

    public function suratKeluar()
    {
        return $this->hasMany(SuratKeluar::class, 'id_tandatangan', 'id_tandatangan');
    }
}
