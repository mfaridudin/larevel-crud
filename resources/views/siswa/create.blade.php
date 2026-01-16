<x-applayouts>
    <div class="card">
        <div class="card-body flex flex-col p-6">
            <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                <div class="flex-1">
                    <div class="card-title text-slate-900 dark:text-white">Tambah Siswa</div>
                </div>
                 <a href="/siswa" class="btn inline-flex justify-center btn-primary active">
                    <span class="flex items-center">
                            <iconify-icon class="text-2xl relative" icon="ic:round-keyboard-arrow-left"><template shadowrootmode="open"><style data-style="data-style">:host{display:inline-block;vertical-align:0}span,svg{display:block}</style><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M14.71 15.88L10.83 12l3.88-3.88a.996.996 0 1 0-1.41-1.41L8.71 11.3a.996.996 0 0 0 0 1.41l4.59 4.59c.39.39 1.02.39 1.41 0c.38-.39.39-1.03 0-1.42"></path></svg></template></iconify-icon>
                            <span>Back</span>
                    </span>
                </a>
            </header>
            <div class="card-text h-full">
                <form action="/siswa" method="post" class="space-y-4">
                    @csrf
                    @method('POST')
                    <div class="input-area">
                        <label for="name" class="form-label">Nama Siswa</label>
                        <div class="relative">
                            <input id="nama_siswa" name="nama_siswa" type="text" class="form-control pr-9" value="{{ old('nama_siswa') }}"
                                placeholder="Username">
                        </div>
                        @error('nama_siswa')
                            <span
                                class="font-Inter text-sm text-danger-500 pt-2 mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="input-area">
                        <label for="email" class="form-label">NISN</label>
                        <div class="relative">
                            <input id="email" name="nisn_siswa" type="number" class="form-control" value="{{ old('nisn_siswa') }}"
                                placeholder=" Enter Your Email">
                        </div>
                        @error('nisn_siswa')
                            <span
                                class="font-Inter text-sm text-danger-500 pt-2 mt-1">{{ $message }}</span>
                        @enderror

                    </div>
                    <button class="btn flex justify-center btn-dark ml-auto">Submit</button>
                </form>
            </div>
        </div>
    </div>
</x-applayouts>