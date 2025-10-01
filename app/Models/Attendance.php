<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $table = 'attendance';

    protected $fillable = [
        'siswa_id',
        'total_hari_efektif',
        'total_hadir',
        'total_alpha',
        'total_izin',
        'total_sakit',
    ];

    public function siswa()
    {
        return $this->belongsTo(SiswaSekolah::class, 'siswa_id');
    }

    // Accessor untuk persentase kehadiran (calculated)
    public function getPersentaseKehadiranAttribute()
    {
        if ($this->total_hari_efektif > 0) {
            return round(($this->total_hadir / $this->total_hari_efektif) * 100, 2);
        }
        return 0;
    }

    // Accessor untuk kategori kehadiran
    public function getKategoriKehadiranAttribute()
    {
        $persentase = $this->persentase_kehadiran;

        if ($persentase >= 95)
            return 'Sangat Baik';
        if ($persentase >= 85)
            return 'Baik';
        if ($persentase >= 75)
            return 'Cukup';
        if ($persentase >= 65)
            return 'Kurang';
        return 'Sangat Kurang';
    }

    // Scope untuk filter berdasarkan persentase kehadiran
    public function scopeByPersentase($query, $min, $max = 100)
    {
        return $query->whereRaw('(total_hadir / total_hari_efektif * 100) BETWEEN ? AND ?', [$min, $max]);
    }
}
