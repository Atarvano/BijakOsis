<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - BijakOsis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
<nav class="navbar navbar-expand-lg bg-body-white p-3 shadow-sm">
    <div class="container-lg">
        <a class="navbar-brand fw-bold" href="/">BijakOsis</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item mb-2 mb-lg-0">
                    <a class="px-3 btn btn-dark text-white btn-outline-info" aria-current="page"
                        href="/daftar">Daftar</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="bg-white p-4 rounded shadow-sm">
                    <div class="text-center mb-4">
                        <div class="d-flex justify-content-center mb-3">
                            <img src="https://ui-avatars.com/api/?name=Login&background=4a5568&color=fff&size=80"
                                alt="Profile" class="rounded-circle">
                        </div>
                        <h4 class="mb-1">Login OSIS</h4>
                        <p class="text-muted mb-2">Masukkan data login Anda</p>
                        <div class="alert alert-info py-2 mb-0">
                            <small>
                                <strong>Siswa:</strong> NISN + No HP<br>
                                <strong>Guru:</strong> Username + Password
                            </small>
                        </div>
                    </div>

                    <!-- Alert Messages -->
                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            <strong>Error!</strong> {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle me-2"></i>
                            <strong>Berhasil!</strong> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-circle me-2"></i>
                            <strong>Peringatan!</strong> 
                            @foreach($errors->all() as $error)
                                {{ $error }}
                            @endforeach
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="field1" class="form-label fw-semibold">
                                <i class="fas fa-user me-2"></i>NISN / Username
                            </label>
                            <input type="text" name="field1" class="form-control" id="field1"
                                placeholder="Masukkan NISN (siswa) atau Username (guru)" 
                                value="{{ old('field1') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="field2" class="form-label fw-semibold">
                                <i class="fas fa-key me-2"></i>No HP / Password
                            </label>
                            <input type="password" name="field2" class="form-control" id="field2"
                                placeholder="Masukkan No HP (siswa) atau Password (guru)" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 py-2">
                            <i class="fas fa-sign-in-alt me-2"></i> Masuk
                        </button>
                    </form>

       

                </div>
            </div>
        </div>
    </div>

    @include('components.footer')
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>