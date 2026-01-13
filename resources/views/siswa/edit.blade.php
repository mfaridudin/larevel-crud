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
        <a href="/siswa" class="btn btn-primary t-12">Kembali</a>

        <h1>Edit Data Siswa</h1>

        <form action="/siswa/{{ $siswa->id }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Nama Siswa</label>
                <input type="text" class="form-control" name="nama_siswa" value="{{$siswa->nama}}">
                @error('nama_siswa')
                    <div id="emailHelp" class="form-text">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">NISN Siswa</label>
                <input type="text" class="form-control" name="nisn_siswa" value="{{$siswa->nisn->nisn}}">
                @error('nisn_siswa')
                    <div id="emailHelp" class="form-text">{{ $message }}</div>
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