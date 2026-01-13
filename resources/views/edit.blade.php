<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hobbies</title>

    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>

    <div class="container p-4">
        <a href="/hobbies" class="btn btn-primary t-12">Kembali</a>

        <h1>Edit Hobi</h1>

        <form action="/hobbies/{{ $hobby->id }}/edit" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Nama Hobi</label>
                <input type="text" class="form-control" name="nama_hobi" value="{{$hobby->hobby}}">
                @error('nama_hobi')
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
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