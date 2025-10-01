<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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

        // Parse datetime dengan timezone Indonesia
        $carbonDate = Carbon::createFromFormat('Y-m-d H:i', $datetime, 'Asia/Jakarta');
        $pengaturan->waktu_pengumuman = $carbonDate;
        $pengaturan->save();

        return $pengaturan;
    }

    public static function isPengumumanReady()
    {
        $waktu = self::getWaktuPengumuman();
        if (!$waktu)
            return true;

        // Bandingkan dengan waktu sekarang dalam timezone Asia/Jakarta
        $sekarang = now('Asia/Jakarta');
        $waktuPengumuman = Carbon::parse($waktu)->setTimezone('Asia/Jakarta');

        return $sekarang->gte($waktuPengumuman);
    }
}