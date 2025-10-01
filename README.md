# BijakOSIS - Sistem Pendaftaran OSIS

Aplikasi web untuk mengelola pendaftaran dan seleksi siswa OSIS berbasis Laravel dengan database SQLite.

## 🚀 Setup Development

### Instalasi Pertama Kali

```bash
# Clone repository
git clone https://github.com/username/BijakOsis.git
cd BijakOsis

# Install dependencies
composer install
npm install

# Setup environment
cp .env.example .env
php artisan key:generate

# Edit .env untuk database SQLite
DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite
```

### Setup Database

```bash
# Buat file database SQLite
touch database/database.sqlite
# Atau di Windows:
type nul > database/database.sqlite

# Setup fresh database dengan semua data
php artisan migrate:fresh --force
php artisan db:seed --class=ProductionDataSeeder
```

### Jalankan Development Server

```bash
npm run dev
php artisan serve
```

## 📦 Setup untuk Deployment/Laptop Teman

### Setup Lengkap (Fresh Install)

```bash
# 1. Clone dan install dependencies
git clone https://github.com/username/BijakOsis.git
cd BijakOsis
composer install

# 2. Setup environment
cp .env.example .env
php artisan key:generate

# 3. Buat database SQLite
touch database/database.sqlite  # Linux/Mac
# atau
type nul > database/database.sqlite  # Windows

# 4. Setup database dengan data lengkap
php artisan migrate:fresh --force
php artisan db:seed --class=ProductionDataSeeder

# 5. Setup storage dan cache
php artisan storage:link
php artisan config:clear
php artisan cache:clear

# 6. Jalankan server
php artisan serve
```

### Login Default

**Email**: `admin@sekolah.com`
**Password**: `admin123`

## 🛠️ Troubleshooting

### Error "table sessions already exists"

**Error lengkap:**

```
SQLSTATE[HY000]: General error: 1 table "sessions" already exists
(Connection: sqlite, SQL: create table "sessions" ...)
```

**Penyebab:** Migration sessions sudah pernah dijalankan sebelumnya, tapi Laravel coba buat lagi.

**Solusi:**

````bash
# Option 1: Reset total database (RECOMMENDED)
php artisan migrate:fresh --force
php artisan db:seed --class=ProductionDataSeeder

# Option 2: Hapus table sessions dulu
php artisan tinker
Schema::dropIfExists('sessions');
exit
php artisan migrate

# Option 3: Skip migration sessions yang error
php artisan migrate --path=database/migrations/2025_10_01_221218_add_sp_points_to_siswa_sekolah_table.php
`

### Untuk Teman yang Sudah Punya Data Siswa

Kalau sudah ada data siswa tapi butuh kolom baru (sp_points, eskul, attendance):

```bash
# 1. Jalankan migration untuk kolom baru saja
php artisan migrate

# 2. Update kolom baru tanpa hapus data siswa existing
php artisan db:seed --class=UpdateKolomBaruSeeder
````

``

### Update Data Saja (Tanpa Reset)

````bash

```bash
# Update SP Points saja
php artisan db:seed --class=SpPointsSeeder

# Update Eskul dan Attendance saja
php artisan db:seed --class=EskulSiswaSeeder
````

`

### Clear All Cache

````bash

## 📊 Data yang Dihasilkan

ProductionDataSeeder akan membuat:

- **12 Kelas**: X IPA/IPS, XI IPA/IPS, XII IPA/IPS
- **100 Siswa**: Dengan NISN dan nama random
- **100 Nilai**: 5 mata pelajaran per siswa
- **100 Eskul**: 1-2 ekstrakurikuler per siswa
- **100 Attendance**: Data kehadiran dengan persentase
- **SP Points**: 60% siswa = 0 point, 20% = 300, 15% = 600, 5% = 900
- **1 User Guru**: admin@sekolah.com

## 🏗️ Struktur Database

```text
├── kelas (12 kelas)
├── siswa_sekolah (100 siswa + sp_points)
├── nilai_siswa (100 record nilai)
├── eskul_siswa (100 record eskul)
├── attendance (100 record kehadiran)
├── users_guru (1 admin)
└── pendaftaran_osis (data pendaftar)
````

## 🎯 Fitur Utama

-   Dashboard guru dengan data siswa lengkap
-   Sistem penilaian dengan badge warna
-   Data kehadiran dengan persentase otomatis
-   Manajemen ekstrakurikuler
-   Filter dan sorting siswa
-   Export data pendaftar

---

---

``
