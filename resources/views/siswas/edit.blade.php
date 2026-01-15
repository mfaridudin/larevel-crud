<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Siswas</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container p-4">
        <h1>Edit Siswas</h1>
        <a href="/siswas" class="btn btn-primary mb-3">Kembali</a>

        <form action="/siswas/{{ $siswas->id }}" method="post">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nama Siswas</label>
                <input type="text" class="form-control" name="nama" value="{{ old('nama', $siswas->nama) }}">

                @error('nama')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Nomor Telephone</label>

                <div id="phone-wrapper">
                    @foreach(old('phone_numbers', $siswas->phone_numbers) as $index => $phone_number)
                        <div class="d-flex mb-2">
                            <input type="number" class="form-control me-2" name="phone_numbers[]" value="{{ $phone_number }}"
                                placeholder="Nomor telephone">

                            <button type="button" class="btn btn-danger remove-phone" {{ $index === 0 ? 'disabled' : '' }}>
                                X
                            </button>
                        </div>
                    @endforeach
                </div>

                <button type="button" id="add-phone" class="btn btn-sm btn-secondary">
                    + Tambah Nomor
                </button>

                @error('phone_numbers.*')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
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
            toggleRemoveButtons();
        });

        document.addEventListener('click', function (e) {
            if (e.target.classList.contains('remove-phone')) {
                e.target.parentElement.remove();
                toggleRemoveButtons();
            }
        });

        function toggleRemoveButtons() {
            const buttons = document.querySelectorAll('.remove-phone');
            buttons.forEach((btn, index) => {
                btn.disabled = buttons.length === 1;
            });
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>