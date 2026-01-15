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
            <h3 class="text-center text-primary mb-1">Forgot Password</h3>
            <p class="text-center text-muted mb-3">Masukkan email anda</p>

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

            <form method="POST" action="{{ route('password.email') }}" class="d-flex flex-column gap-3">
                @csrf
                <input type="email" name="email" class="input p-1" placeholder="Masukkan email" required>

                @if ($errors->any())
                    <div class="alert alert-danger py-2 text-center">
                        {{ $errors->first('email') }}
                    </div>
                @endif

                @if (session('status'))
                    <div class="alert alert-success py-2 text-center">
                        {{ session('status') }}
                    </div>
                @endif

                <button type="submit" class="btn btn-primary">Kirim Link Reset</button>
            </form>
        </div>
    </section>


    {{-- bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>