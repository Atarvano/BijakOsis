# Update Views untuk Attendance & Eskul

## Perubahan yang Sudah Dibuat

### 1. **Detail Siswa (detail.blade.php)**

#### Attendance & Behavior Section

-   ✅ **Persentase kehadiran real** dari database attendance
-   ✅ **Total hari** (hadir/total hari efektif)
-   ✅ **Badge warna** berdasarkan persentase:
    -   95%+ = Hijau (Sangat Baik)
    -   85%+ = Biru (Baik)
    -   75%+ = Kuning (Cukup)
    -   <75% = Merah (Kurang)
-   ✅ **Detail absensi** (alpha, izin, sakit)

#### Extracurricular Activities Section

-   ✅ **Data eskul real** dari database
-   ✅ **Primary activity** (nama_eskul1)
-   ✅ **Secondary activity** (nama_eskul2) jika ada
-   ✅ **Available slot** indicator jika hanya ada 1 eskul
-   ✅ **Status badge** untuk setiap aktivitas

### 2. **Dashboard Guru (dashboard.blade.php)**

#### Table Columns Update

-   ✅ **Attendance column** menampilkan persentase real dengan badge warna
-   ✅ **Extracurricular column** menampilkan nama eskul real
-   ✅ **Fallback** untuk data yang tidak tersedia ("-")

#### Data Loading

-   ✅ **Load attendance data** per siswa dalam loop
-   ✅ **Proper color coding** untuk persentase attendance
-   ✅ **Clean data display** tanpa hardcode

### 3. **Controller Update (DashboardController.php)**

-   ✅ **Import Attendance model**
-   ✅ **Load attendance relationship** di method show()
-   ✅ **Eager loading** untuk performance

## Data Structure yang Digunakan

### Attendance Table (per semester)

```
- total_hari_efektif: 200 (default)
- total_hadir: jumlah hari hadir
- total_alpha: jumlah hari alpha
- total_izin: jumlah hari izin
- total_sakit: jumlah hari sakit
- persentase_kehadiran: calculated via accessor
```

### Eskul Table

```
- nama_eskul1: aktivitas primer (required)
- nama_eskul2: aktivitas sekunder (optional)
```

## View Logic

### Color Coding Attendance

```php
@if($persentase >= 95)
    <span class="badge bg-success">Sangat Baik</span>
@elseif($persentase >= 85)
    <span class="badge bg-primary">Baik</span>
@elseif($persentase >= 75)
    <span class="badge bg-warning">Cukup</span>
@else
    <span class="badge bg-danger">Kurang</span>
@endif
```

### Eskul Display Logic

```php
@if($eskul)
    {{ $eskul->nama_eskul1 }}
    {{ $eskul->nama_eskul2 ? ', ' . $eskul->nama_eskul2 : '' }}
@else
    <span class="text-muted">-</span>
@endif
```

## Testing

✅ **Server running** di `http://127.0.0.1:8000`
✅ **100 siswa** dengan data attendance dan eskul
✅ **Relationships** properly loaded
✅ **UI responsive** dengan Bootstrap 5

## Files Modified

1. `resources/views/guru/detail.blade.php` - Detail siswa page
2. `resources/views/guru/dashboard.blade.php` - Dashboard guru page
3. `app/Http/Controllers/Guru/DashboardController.php` - Controller updates
