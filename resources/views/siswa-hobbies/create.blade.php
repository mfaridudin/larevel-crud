<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siswa-hobi</title>

    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>

    <div class="container p-4">
        <h1>Tambah Hobi Siswa</h1>
        <a href="/siswa-hobi" class="btn btn-primary t-12">Kembali</a>

        <form form action="/siswa-hobi" method="POST">
            @csrf
            
            <label>Pilih Siswa:</label>
            <select name="siswas_id" class="form-select">
                @foreach($siswas as $siswa)
                    <option value="{{ $siswa->id }}">{{ $siswa->nama }}</option>
                @endforeach
            </select>

            <label>Pilih Hobi:</label>
            @foreach($hobbies as $hobi)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="hobbies_id[]" value="{{ $hobi->id }}">
                    <label class="form-check-label">{{ $hobi->hobby }}</label>
                </div>
            @endforeach

            <button type="submit" class="btn btn-primary t-12">Simpan</button>
        </form>

    </div>

    {{-- bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>