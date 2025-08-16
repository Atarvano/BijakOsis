<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa_sekolah';
    protected $primaryKey = 'id'; 
    public $timestamps = false; 

    protected $fillable = [
        'nisn',
        'nama',
        'no_hp',
        'alamat',
        'kelas_id'
    ];
}

