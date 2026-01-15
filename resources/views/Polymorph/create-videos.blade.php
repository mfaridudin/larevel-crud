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

    <div class="container p-4">
        <h1>Tambah videos</h1>
        <a href="/videos" class="btn btn-primary t-12">Kembali</a>

        <form action="/videos" method="post">
            @csrf
            @method('POST')
            <div class="mb-3">
                <label class="form-label">Judul videos</label>
                <input type="text" class="form-control" name="judul_videos" value="{{ old('judul_videos') }}">
                @error('judul_videos')
                    <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                @enderror

            </div>
            <div class="mb-3">
                <label class="form-label">URL videos</label>
                <input type="text" class="form-control" name="url_videos" value="{{ old('url_videos') }}">
                @error('url_videos')
                    <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                @enderror

            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    {{-- bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>