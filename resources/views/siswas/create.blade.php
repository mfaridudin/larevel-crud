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

        <form action="/siswas" method="post">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nama Siswa</label>
                <input type="text" class="form-control" name="nama" value="{{ old('nama') }}">
                @error('nama')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Nomor Telephone</label>

                <div id="phone-wrapper">
                    <div class="d-flex mb-2">
                        <input type="number" class="form-control me-2" name="phone_numbers[]"
                            placeholder="Nomor telephone">

                        <button type="button" class="btn btn-danger remove-phone" disabled>
                            X
                        </button>
                    </div>
                </div>

                <button type="button" id="add-phone" class="btn btn-sm btn-secondary">
                    + Tambah Nomor
                </button>

                @error('phone_numbers.*')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>

    <script>
        document.getElementById('add-phone').addEventListener('click', function () {
            const wrapper = document.getElementById('phone-wrapper');

            const div = document.createElement('div');
            div.classList.add('d-flex', 'mb-2');

            div.innerHTML = `
            <input type="number" class="form-control me-2"
                   name="phone_numbers[]"
                   placeholder="Nomor telephone">
            <button type="button" class="btn btn-danger remove-phone">X</button>
        `;

            wrapper.appendChild(div);
        });

        document.addEventListener('click', function (e) {
            if (e.target.classList.contains('remove-phone')) {
                e.target.parentElement.remove();
            }
        });
    </script>


    {{-- bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>