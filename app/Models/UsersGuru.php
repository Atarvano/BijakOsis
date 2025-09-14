<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class UsersGuru extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users_guru';

    protected $fillable = [
        'username',
        'password',
        'nama',
        'nip',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}