<x-applayouts>
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
            <h1>Tambah Siswa</h1>
            <a href="/siswa" class="btn btn-primary t-12">Kembali</a>

            <form action="/siswa" method="post">
                @csrf
                @method('POST')
                <div class="mb-3">
                    <label class="form-label">Nama Siswa</label>
                    <input type="text" class="form-control" name="nama_siswa" value="{{ old('nama_siswa') }}">
                    @error('nama_siswa')
                        <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                    @enderror

                </div>
                <div class="mb-3">
                    <label class="form-label">NISN Siswa</label>
                    <input type="text" class="form-control" name="nisn_siswa" value="{{ old('nisn_siswa') }}">
                    @error('nisn_siswa')
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

    <div class="card-body flex flex-col p-6">
        <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
            <div class="flex-1">
                <div class="card-title text-slate-900 dark:text-white">Simple Form Validation With Tootltips</div>
            </div>
        </header>
        <div class="card-text h-full">
            <form action="/siswa" method="post" class="space-y-4" id="tooltipValidation" novalidate="novalidate">
                <div class="input-area">
                    <label for="tooltip_name" class="form-label">Nama Siswa</label>
                    <input id="tooltip_name" name="tooltip_name" type="text" class="form-control error"
                        placeholder="Username" aria-describedby="tooltip_name-error" aria-invalid="true"><span
                        id="tooltip_name-error" class="error">Please enter your name</span>
                </div>
                <div class="input-area">
                    <label for="tooltip_email" class="form-label">Email</label>
                    <input id="tooltip_email" name="tooltip_email" type="email" class="form-control error"
                        placeholder="Enter Your Email" required="required" aria-describedby="tooltip_email-error"><span
                        id="tooltip_email-error" class="error">Enter your email</span>
                </div>
                <button class="btn flex justify-center btn-dark ml-auto">Submit</button>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-body flex flex-col p-6">
            <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                <div class="flex-1">
                    <div class="card-title text-slate-900 dark:text-white">Simple Form Validation</div>
                </div>
            </header>
            <div class="card-text h-full">
                <form action="/siswa" method="post" class="space-y-4" id="loginForm">
                    <div class="input-area">
                        <label for="name" class="form-label">Username</label>
                        <div class="relative">
                            <input id="name" type="text" class="form-control pr-9" placeholder="Username">
                        </div>
                        <span id="nameErrorMsg" class="font-Inter text-sm text-danger-500 pt-2 hidden mt-1">This is
                            valid state.</span>
                    </div>
                    <div class="input-area">
                        <label for="email" class="form-label">Email</label>
                        <div class="relative">
                            <input id="email" type="email" class="form-control" placeholder="Enter Your Email">
                        </div>
                        <span id="emailErrorMsg" class="font-Inter text-sm text-danger-500 pt-2 hidden mt-1"></span>
                    </div>
                    <button class="btn flex justify-center btn-dark ml-auto">Submit</button>
                </form>
            </div>
        </div>
    </div>
</x-applayouts>