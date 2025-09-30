<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    @vite(['resources/js/app.js'])
</head>

<body>
    @include('components.header')

    <div class="container-fluid py-5">
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-6">
                <div class="card shadow-sm p-4 mb-5 bg-white rounded">
                    <h2 class="text-center mb-2">Pendaftaran Siswa OSIS</h2>
                    <p class="text-center text-muted mb-4">Daftarkan diri Anda untuk bergabung dengan OSIS dan
                        berkontribusi untuk sekolah</p>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ url('/daftar') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" name="nama"
                                placeholder="Masukkan nama lengkap Anda">
                        </div>
                        <div class="mb-3">
                            <label for="nisn" class="form-label">NISN (Nomor Induk Siswa Nasional)</label>
                            <input type="number" class="form-control" id="nisn" name="nisn"
                                placeholder="Masukkan NISN Anda">
                            <small class="text-muted">NISN akan divalidasi dengan database sekolah</small>
                        </div>
                        <div class="mb-3">
                            <label for="no_hp" class="form-label">No HP</label>
                            <input type="number" class="form-control" id="no_hp" name="no_hp"
                                placeholder="Masukkan nomor HP Anda">
                        </div>
                        <div class="mb-3">
                            <label for="kelas" class="form-label">Kelas</label>
                            <select class="form-select" id="kelas" name="kelas">
                                <option selected disabled>Pilih kelas Anda</option>
                                @foreach($kelas as $k)
                                    <option value="{{ $k->id }}">{{ $k->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="motivasi" class="form-label">Motivasi Bergabung dengan OSIS</label>
                            <textarea class="form-control" id="motivasi" name="motivasi" rows="4"
                                placeholder="Jelaskan motivasi dan alasan Anda ingin bergabung dengan OSIS. Ceritakan kontribusi apa yang dapat Anda berikan untuk sekolah dan sesama siswa."></textarea>
                            <small class="text-muted">Minimal 100 karakter</small>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="syarat" name="syarat">
                            <label class="form-check-label" for="syarat">
                                Saya menyetujui <a href="#" class="text-dark text-decoration-underline">syarat dan
                                    ketentuan</a> yang berlaku dan berkomitmen untuk menjalankan tugas OSIS dengan baik
                                jika terpilih.
                            </label>
                        </div>
                        <button type="submit" class="btn btn-dark w-100 py-2">
                            <i class="bi bi-pencil-square me-2"></i>Daftar Sekarang
                        </button>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <div class="px-5 row justify-content-center mb-5">
        <div class="col-md-3 mb-4">
            <div class="card h-100 text-center p-4 shadow-sm">
                <div class="mb-3">
                    <i class="bi bi-funnel display-5 text-muted"></i>
                </div>
                <h6 class="fw-bold">Proses Seleksi</h6>
                <p class="text-muted">Seleksi berdasarkan nilai, kehadiran, dan poin perilaku, divalidasi dengan
                    database sekolah</p>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card h-100 text-center p-4 shadow-sm">
                <div class="mb-3">
                    <i class="bi bi-megaphone display-5 text-muted"></i>
                </div>
                <h6 class="fw-bold">Pengumuman</h6>
                <p class="text-muted">Hasil seleksi akan diumumkan pada tanggal yang telah ditentukan</p>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card h-100 text-center p-4 shadow-sm">
                <div class="mb-3">
                    <i class="bi bi-people display-5 text-muted"></i>
                </div>
                <h6 class="fw-bold">Kontribusi</h6>
                <p class="text-muted">Berkontribusi aktif dalam kegiatan OSIS dan pengembangan siswa</p>
            </div>
        </div>
    </div>

    @include('components.footer')
</body>

</html>