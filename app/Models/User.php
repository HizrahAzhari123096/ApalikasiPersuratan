<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class User extends Model
{
    use HasFactory;

    protected $table = 'users'; // Nama tabel di database
    protected $primaryKey = 'id_user'; // Nama primary key di tabel

    protected $fillable = [
        'user_name',
        'password',
        'status',
        'nama_petugas',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Mutator untuk mengenkripsi password sebelum disimpan
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
}