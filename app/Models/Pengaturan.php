<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaturan extends Model
{
    use HasFactory;

    protected $table = 'pengaturan';

    protected $fillable = [
        'tanggal',
        'waktu_pengumuman'
    ];

    protected $casts = [
        'tanggal' => 'date',
        'waktu_pengumuman' => 'datetime'
    ];

    public static function getWaktuPengumuman()
    {
        $pengaturan = self::first();
        return $pengaturan ? $pengaturan->waktu_pengumuman : null;
    }

    public static function setWaktuPengumuman($datetime)
    {
        $pengaturan = self::first();
        if (!$pengaturan) {
            $pengaturan = new self();
        }

        $pengaturan->waktu_pengumuman = $datetime;
        $pengaturan->save();

        return $pengaturan;
    }

    public static function isPengumumanReady()
    {
        $waktu = self::getWaktuPengumuman();
        return $waktu ? now()->gte($waktu) : true;
    }
}