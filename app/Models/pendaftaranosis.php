<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pendaftaranosis extends Model
{
    protected $table = 'pendaftaran_osis';

    protected $fillable = [
        'nama',
        'kelas',
        'jurusan',
        'no_hp',
        'alamat',
    ];

    protected $primaryKey = 'id';

}
