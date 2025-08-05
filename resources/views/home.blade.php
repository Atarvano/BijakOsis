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


    <div class="bg-light py-5">

        <div class="container my-5">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h1 class="display-4 fw-normal mb-3">Platform Pendaftaran OSIS Digital</h1>
                    <p class="lead mb-4">
                        Bergabunglah dengan Organisasi Siswa Intra Sekolah (OSIS) dan jadilah bagian dari perubahan
                        positif di sekolah kita.
                    </p>
                    <a href="#" class="btn btn-dark btn-lg me-2 mb-2 mb-lg-0">Daftar Sekarang</a>
                    <a href="#" class="btn btn-outline-secondary btn-lg">Pelajari Lebih Lanjut</a>
                </div>
                <div class="col-lg-6 text-center">
                    <img src="https://images.unsplash.com/photo-1513258496099-48168024aec0?auto=format&fit=crop&w=600&q=80"
                        alt="BijakOsis" class="img-fluid rounded shadow">
                </div>
            </div>
        </div>
    </div>

    <article class="container my-5">
        <h2 class="mb-4 text-center">Mengapa Memilih BijakOSIS?</h2>
        <p class="text-center text-muted mb-5">Platform modern yang memudahkan proses pendaftaran dan seleksi anggota
            OSIS<br>dengan sistem yang transparan dan efisien.</p>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm text-center py-5">
                    <div class="mb-3">
                        <i class="bi bi-clock-history display-1 text-muted"></i>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Pendaftaran Mudah</h5>
                        <p class="card-text text-muted">Proses pendaftaran yang sederhana dan cepat dengan validasi data
                            siswa otomatis.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm text-center py-5">
                    <div class="mb-3">
                        <i class="bi bi-funnel display-1 text-muted"></i>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Seleksi Otomatis</h5>
                        <p class="card-text text-muted">Sistem filtering berdasarkan nilai akademik, kehadiran, dan poin
                            perilaku.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm text-center py-5">
                    <div class="mb-3">
                        <i class="bi bi-eye display-1 text-muted"></i>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Transparansi</h5>
                        <p class="card-text text-muted">Proses seleksi yang transparan dengan pengumuman hasil di hari
                            yang telah ditentukan.</p>
                    </div>
                </div>
            </div>
        </div>
    </article>


    <div class="bg-light">
        <div class="container py-5">
            <h2 class="mb-4 text-center">Alur Pendaftaran</h2>
            <p class="text-center text-muted mb-5">
                Ikuti langkah-langkah sederhana untuk mendaftar sebagai calon anggota OSIS
            </p>
            <div class="row">
                <div class="col-md-3 mb-4">
                    <div class="card h-100 text-center py-5">
                        <div class="mb-3">
                            <span
                                class="d-inline-flex align-items-center justify-content-center rounded-circle bg-black text-white fs-3"
                                style="width: 48px; height: 48px;">
                                1
                            </span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Daftar</h5>
                            <p class="card-text text-muted">Isi formulir pendaftaran dengan data diri dan motivasi</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card h-100 text-center py-5">
                        <div class="mb-3">
                            <span
                                class="d-inline-flex align-items-center justify-content-center rounded-circle bg-black text-white fs-3"
                                style="width: 48px; height: 48px;">
                                2
                            </span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Validasi</h5>
                            <p class="card-text text-muted">Sistem memvalidasi NISN dengan database sekolah</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card h-100 text-center py-5">
                        <div class="mb-3">
                            <span
                                class="d-inline-flex align-items-center justify-content-center rounded-circle bg-black text-white fs-3"
                                style="width: 48px; height: 48px;">
                                3
                            </span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Seleksi</h5>
                            <p class="card-text text-muted">Guru melakukan proses seleksi</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card h-100 text-center py-5">
                        <div class="mb-3">
                            <span
                                class="d-inline-flex align-items-center justify-content-center rounded-circle bg-black text-white fs-3"
                                style="width: 48px; height: 48px;">
                                4
                            </span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Pengumuman</h5>
                            <p class="card-text text-muted">Hasil seleksi diumumkan pada tanggal yang ditentukan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-dark">
        <div class="container py-5">
            <h2 class="mb-3 text-center text-white">Siap Bergabung dengan OSIS?</h2>
            <p class="text-center text-white mb-3">Jangan lewatkan kesempatan untuk menjadi bagian dari perubahan
                positif di sekolah. <br>Daftarkan diri Anda sekarang!</p>
            <div class="text-center">
                <a href="#" class="btn btn-light btn-lg me-2 mb-2 mb
                -lg-0">Mulai Pendaftaran</a>
            </div>
        </div>
    </div>


    @include('components.footer')
</body>

</html>