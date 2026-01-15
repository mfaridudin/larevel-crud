<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>videos</title>

    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>

    <div class="container py-4">

        @if (session('message'))
            <div class="alert alert-primary">
                {{ session('message') }}
            </div>
        @endif

        <h1 class="mb-3">Detail Video</h1>

        <a href="/videos" class="btn btn-secondary mb-4">Kembali</a>

        <h4 class="mb-3">{{ $video->title }}</h4>

        <div class="row g-4">
            <div class="col-md-8">
                <div class="ratio ratio-16x9 shadow rounded">
                    <iframe
                        src="{{ $video->url }}"
                        allowfullscreen>
                    </iframe>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Tambah Komentar</h5>

                        <form action="/videos/{{ $video->id }}/comment" method="POST">
                            @csrf

                            <div class="mb-3">
                                <textarea
                                    class="form-control"
                                    name="body"
                                    rows="4"
                                    placeholder="Tulis komentar..."
                                >{{ old('body') }}</textarea>

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
                @forelse ($video->comments as $item )
                    <li class="list-group-item">
                        {{ $item->body }}
                    </li>
                @empty
                    
                @endforelse
               
            </ul>
        </div>

    </div>

    {{-- bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>