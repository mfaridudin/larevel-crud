<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>posts</title>

    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>

    <div class="container p-4">
        <h1>Edit Posts</h1>
        <a href="/posts" class="btn btn-primary t-12">Kembali</a>

        <form action="/posts/{{ $post->id }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Judul Post</label>
                <input type="text" class="form-control" name="judul_posts" value="{{ $post->title }}">
                @error('judul_posts')
                    <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                @enderror

            </div>
            <div class="mb-3">
                <label class="form-label">Konten Post</label>

                <textarea
                    class="form-control"
                    name="content_posts"
                    rows="5"
                    placeholder="Tulis konten post..."
                >{{ $post->content}}</textarea>

                @error('content_posts')
                    <div class="form-text text-danger">
                        {{ $message }}
                    </div>
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