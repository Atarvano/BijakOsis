# Dokumentasi Perubahan Database - BijakOsis

## Yang Sudah Dibuat

### 1. Migration Baru

-   **`2025_10_01_211013_add_eskul_and_attendance_to_siswa_sekolah_table.php`**

    -   Menambah kolom `eskul_id` (nullable, foreign key ke table eskul_siswa)
    -   Menambah kolom `attendance_id` (nullable, foreign key ke table attendance)

-   **`2025_10_01_211020_create_attendance_table.php`**
    -   Table baru untuk menyimpan total kehadiran siswa per semester
    -   Kolom: id, siswa_id, total_hari_efektif (default: 200), total_hadir, total_alpha, total_izin, total_sakit, timestamps
    -   Satu siswa = satu record attendance untuk keseluruhan semester

### 2. Model Baru

-   **`App\Models\Attendance`**
    -   Model untuk table attendance
    -   Relationship belongsTo dengan SiswaSekolah
    -   Accessor untuk menghitung persentase kehadiran secara otomatis
    -   Accessor untuk kategori kehadiran (Sangat Baik, Baik, Cukup, dll)
    -   Scope untuk filter berdasarkan persentase kehadiran

### 3. Model Update

-   **`App\Models\SiswaSekolah`**
    -   Ditambah fillable: eskul_id, attendance_id
    -   Ditambah relationship: attendance() (hasMany), currentAttendance() (belongsTo)

### 4. Seeder Baru

-   **`EskulSiswaSeeder`**
    -   Generate data eskul untuk semua siswa yang sudah ada
    -   Generate data attendance 30 hari terakhir untuk setiap siswa
    -   Update foreign key di table siswa_sekolah

### 5. Factory Baru

-   **`EskulSiswaFactory`** - untuk generate data eskul testing
-   **`AttendanceFactory`** - untuk generate data attendance testing

## Data yang Dihasilkan

### Eskul

-   20 jenis eskul tersedia (Pramuka, PMR, OSIS, dll.)
-   Setiap siswa mendapat 1-2 eskul secara random
-   Total: 100 data eskul (sesuai jumlah siswa)

### Attendance

-   30 hari data kehadiran untuk setiap siswa
-   Distribusi status:
    -   80% hadir
    -   10% izin
    -   5% sakit
    -   5% alpha
-   Total: 3,000 records attendance (100 siswa × 30 hari)

## Relationship Database

```
siswa_sekolah
├── hasOne → eskul_siswa (via eskul_id)
├── hasMany → attendance (via siswa_id)
└── belongsTo → attendance (via attendance_id) // current attendance

eskul_siswa
└── belongsTo → siswa_sekolah (via siswa_id)

attendance
└── belongsTo → siswa_sekolah (via siswa_id)
```

## Command yang Sudah Dijalankan

```bash
# Migration
php artisan migrate --path=/database/migrations/2025_10_01_211020_create_attendance_table.php
php artisan migrate --path=/database/migrations/2025_10_01_211013_add_eskul_and_attendance_to_siswa_sekolah_table.php

# Seeding
php artisan db:seed --class=EskulSiswaSeeder
```

## Hasil

-   ✅ Table attendance berhasil dibuat
-   ✅ Kolom eskul_id dan attendance_id berhasil ditambah ke siswa_sekolah
-   ✅ Data eskul berhasil di-generate untuk 100 siswa
-   ✅ Data attendance berhasil di-generate untuk 3,000 records
-   ✅ Foreign key relationship berhasil di-setup
-   ✅ Model relationships berhasil dibuat
