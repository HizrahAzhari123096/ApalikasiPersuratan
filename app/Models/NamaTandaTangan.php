<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NamaTandaTangan extends Model
{
    use HasFactory;

    protected $table = 'namatandatangan';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'nama_tandatangan',
        'jabatan',
        'nip',
        
    ];
}