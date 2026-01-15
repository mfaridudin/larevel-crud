<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Post</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container py-4">

        @if (session('message'))
            <div class="alert alert-primary">
                {{ session('message') }}
            </div>
        @endif

        <h1 class="mb-3">Detail Post</h1>

        <a href="/posts" class="btn btn-secondary mb-4">Kembali</a>

        <h4 class="mb-3">{{ $post->title }}</h4>

        <div class="row g-4">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <p class="mb-0">
                            {{ $post->content }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Tambah Komentar</h5>

                        <form action="/posts/{{ $post->id }}/comment" method="POST">
                            @csrf

                            <div class="mb-3">
                                <textarea class="form-control" name="body" rows="4"
                                    placeholder="Tulis komentar...">{{ old('body') }}</textarea>

                                @error('body')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <button class="btn btn-primary w-100">
                                Kirim
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-5">
            <h5>Komentar</h5>

            <ul class="list-group">
                @forelse ($post->comments as $item)
                    <li class="list-group-item">
                        {{ $item->body }}
                    </li>
                @empty
                    <li class="list-group-item text-muted">
                        Belum ada komentar
                    </li>
                @endforelse
            </ul>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>