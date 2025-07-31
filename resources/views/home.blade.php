<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    @vite(['resources/js/app.js'])
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-white p-3 shadow-sm">
        <div class="container-lg">
            <a class="navbar-brand fw-bold" href="#">BijakOsis</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item mb-2 mb-lg-0">
                        <a class="btn btn-outline-primary me-2" aria-current="page" href="#">Masuk</a>
                    </li>
                    <li class="nav-item mb-2 mb-lg-0">
                        <a class="px-3   btn btn-dark text-white btn-outline-info" aria-current="page"
                            href="#">Daftar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


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
</body>

</html>