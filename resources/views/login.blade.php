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

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="bg-white p-4 rounded shadow-sm">
                    <div class="text-center mb-4">
                        <img src="https://ui-avatars.com/api/?name=User&background=4a5568&color=fff&size=80"
                            alt="Profile" class="rounded-circle mb-3">
                        <h4 class="mb-1">Login Pendaftaran OSIS</h4>
                        <p class="text-muted mb-0">Silakan masukkan NISN dan No HP</p>
                    </div>

                    @if(session('error'))
                        <div class="alert alert-danger d-flex align-items-center">
                            <i class="fas fa-exclamation-circle me-2"></i>
                            {{ session('error') }}
                        </div>
                    @endif
                    @if(session('success'))
                        <div class="alert alert-success d-flex align-items-center">
                            <i class="fas fa-check-circle me-2"></i>
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nisn" class="form-label fw-semibold">
                                <i class="fas fa-id-card me-2"></i>NISN
                            </label>
                            <input type="text" name="nisn" class="form-control" id="nisn" placeholder="Masukkan NISN"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="no_hp" class="form-label fw-semibold">
                                <i class="fas fa-phone me-2"></i>No HP
                            </label>
                            <input type="text" name="no_hp" class="form-control" id="no_hp" placeholder="Masukkan No HP"
                                required>
                        </div>
                        <button type="submit" class="btn btn-dark w-100">
                            <i class="fas fa-sign-in-alt me-2"></i> Login
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('components.footer')
</body>

</html>