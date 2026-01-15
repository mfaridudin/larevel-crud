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

        @if (session('message'))

            <div class="alert alert-primary" role="alert">
                {{ session('message') }}
            </div>

        @endif
        <h1>Tabel posts</h1>

        <a href="/posts/create" class="btn btn-primary t-12">Tambah posts</a>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Konten</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($posts as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->content }}</td>
                        <td class="d-flex gap-2 items-center">
                            <a href="/posts/{{ $item->id }}/edit" class="btn btn-primary">Edit</a>
                            <a href="/posts/{{ $item->id }}" class="btn btn-warning">Detail</a>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#hapus{{$item->id}}">
                                Hapus
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">
                            data posts belum ada
                        </td>
                    </tr>
                @endforelse

            </tbody>
        </table>

        {{-- modal --}}
        @foreach($posts as $item)
            <div class="modal fade" id="hapus{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog bg-white rounded-3">
                    <form action="/posts/{{$item->id}}" method="POST" class="modal-content">
                        @method('DELETE')
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="exmapleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Yakin ingin menghapus data {{$item->title}} ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
    {{-- bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>