<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siswa</title>

    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>

    <section class="d-flex align-items-center justify-content-center min-vh-100 bg-light">
        <div class="card shadow-sm p-4" style="max-width: 420px; width: 100%;">
            <h3 class="text-center text-primary mb-1">Login Akun</h3>
            <p class="text-center text-muted mb-3">Masukkan email dan password Anda</p>

            @if ($errors->has('login'))
                <div class="alert alert-danger py-2 text-center">
                    {{ $errors->first('login') }}
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success py-2 text-center">
                    {{ session('success') }}
                </div>
            @endif

            <form action="/login" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="email@domain.com"
                        value="{{ old('email') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                </div>

                <button type="submit" class="btn btn-primary w-100">
                    Login
                </button>

                <p class="text-center mt-3 mb-0">
                    Belum punya akun?
                    <a href="/register" class="fw-semibold text-primary">Daftar</a>
                </p>
            </form>
        </div>
    </section>


    {{-- bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>