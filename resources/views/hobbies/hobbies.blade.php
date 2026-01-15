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

        @if (session('message'))

            <div class="alert alert-primary" role="alert">
                {{ session('message') }}
            </div>

        @endif
        <h1>Tabel Hobi</h1>

        <button type="button" onclick="openModalTambah()" class="btn btn-primary t-12">Tambah Hobi</button>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Hobi</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($hobbies as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $item->hobby }}</td>
                        <td class="d-flex gap-2 items-center">
                            <button class="btn btn-primary" onclick="openModalUpdate(this)" data-id="{{ $item->id }}"
                                data-nama="{{ $item->hobby }}">
                                Edit
                            </button>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#hapus{{$item->id}}">
                                Hapus
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">Belum Ada Data</td>
                    </tr>
                @endforelse

            </tbody>
        </table>

        {{-- modal --}}
        @foreach($hobbies as $item)
            <div class="modal fade" id="hapus{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog bg-white rounded-3">
                    <form action="/hobbies/{{$item->id}}/destroy" method="POST" class="modal-content">
                        @method('DELETE')
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="exmapleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Yakin ingin menghapus {{$item->hobby}} ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
        @endforeach

        {{-- modal tambah --}}
        <div id="modal_tambah"
            class="position-fixed top-50 start-50 translate-middle w-25 border p-4 rounded bg-warning visually-hidden"
            style="z-index: 1050;">
            <div>
                <div class="modal-content">
                    <form action="/hobbies/create" method="post">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">New message</h1>
                            <button type="button" class="btn-close" onclick="closeModalTambah()"></button>
                        </div>
                        <div class="modal-body">

                            @csrf
                            @method('POST')
                            <div class="mb-3">
                                <label class="form-label">Nama Hobi</label>
                                <input type="text" class="form-control" name="nama_hobi" value="{{ old('nama_hobi') }}">
                                @error('nama_hobi')
                                    <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                                @enderror

                            </div>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-secondary" onclick="closeModalTambah()">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- modal update --}}
        <div id="modal_update"
            class="position-fixed top-50 start-50 translate-middle w-25 border p-4 rounded bg-warning visually-hidden"
            style="z-index: 1050;">

            <div class="modal-content">
                <form id="formUpdate" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="modal-header">
                        <h5 class="modal-title">Edit Hobi</h5>
                        <button type="button" class="btn-close" onclick="closeModalUpdate()"></button>
                    </div>

                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Nama Hobi</label>
                            <input type="text" class="form-control" id="nama_hobi" name="nama_hobi">
                        </div>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="button" class="btn btn-secondary" onclick="closeModalUpdate()">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>


    </div>

    {{-- bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>

    <script>
        function openModalTambah() {
            console.log('diklik')
            const modal = document.getElementById('modal_tambah');
            modal.classList.add('overflow-foccus');
            modal.classList.remove('visually-hidden');
        }

        function closeModalTambah() {
            console.log('diklik')
            const modal = document.getElementById('modal_tambah');
            modal.classList.remove('overflow-foccus');
            modal.classList.add('visually-hidden');
        }

        function openModalUpdate(button) {
            console.log('modal dibuka');

            const id = button.dataset.id;
            const nama = button.dataset.nama;

            document.getElementById('nama_hobi').value = nama;
            document.getElementById('formUpdate').action = `/hobbies/${id}/edit`;

            const modal = document.getElementById('modal_update');
            modal.classList.remove('visually-hidden');
        }

        function closeModalUpdate() {
            const modal = document.getElementById('modal_update');
            modal.classList.add('visually-hidden');
        }

    </script>
</body>

</html>