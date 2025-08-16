<!DOCTYPE html>
<html>
<head>
    <title>Login Siswa</title>
</head>
<body>
    <h2>Login Siswa</h2>

    @if ($errors->any())
        <div style="color: red;">
            {{ $errors->first() }}
        </div>
    @endif

    @if (session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('login.process') }}" method="POST">
        @csrf
        <label for="nisn">NISN:</label>
        <input type="text" name="nisn" required>
        <button type="submit">Login</button>
    </form>
</body>
</html>
