<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pendaftaranosis extends Model
{
    protected $table = 'pendaftaran_osis';

    protected $fillable = [
        'nama',
        'nisn',
        'kelas_id',
        'no_hp',
        'motivasi',
    ];

    protected $primaryKey = 'id';

}
