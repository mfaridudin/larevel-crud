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

    <div class="container p-4">
        <h1>Tambah Siswas</h1>
        <a href="/siswas" class="btn btn-primary t-12">Kembali</a>

        <form action="/siswas/{{ $siswas->id }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Nama Siswa</label>
                <input type="text" class="form-control" name="nama" value="{{ $siswas->nama}}">
                @error('nama')
                    <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                @enderror

            </div>
            <div class="mb-3">
                <label class="form-label">Nomor telphone 1</label>
                <input type="number" class="form-control" name="no_telp_1" 
                    value="{{ $siswas->phone_numbers->get(0)?->phone_number ?? '' }}">

                @error('no_telp_1')
                    <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                @enderror

            </div>

            <div class="mb-3">
                <label class="form-label">Nomor telphone 2 (Opsional)</label>
                <input type="number" class="form-control" name="no_telp_2" 
                    value="{{ $siswas->phone_numbers->get(0)?->phone_number ?? '' }}">
                @error('no_telp_2')
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