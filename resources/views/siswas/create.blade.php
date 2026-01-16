<x-applayouts>
    <div class="card">
        <div class="card-body flex flex-col p-6">
            <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                <div class="flex-1">
                    <div class="card-title text-slate-900 dark:text-white">Tambah Nomor Telephone</div>
                </div>
                <a href="/siswas" class="btn inline-flex justify-center btn-primary active">
                    <span class="flex items-center">
                        <iconify-icon class="text-2xl relative" icon="ic:round-keyboard-arrow-left"><template
                                shadowrootmode="open">
                                <style data-style="data-style">
                                    :host {
                                        display: inline-block;
                                        vertical-align: 0
                                    }

                                    span,
                                    svg {
                                        display: block
                                    }
                                </style><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                    viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M14.71 15.88L10.83 12l3.88-3.88a.996.996 0 1 0-1.41-1.41L8.71 11.3a.996.996 0 0 0 0 1.41l4.59 4.59c.39.39 1.02.39 1.41 0c.38-.39.39-1.03 0-1.42">
                                    </path>
                                </svg>
                            </template></iconify-icon>
                        <span>Back</span>
                    </span>
                </a>
            </header>
            <div class="card-text h-full">
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
                            <div class="flex justify-between items-end space-x-6" id="phone-wrapper">
                                <div class="input-area w-full">
                                    <input type="tel" class="form-control" name="phone_numbers[]"
                                        placeholder="Nomor telephone">
                                </div>
                                <button
                                    class="inline-flex items-center justify-center h-10 w-10 bg-danger-500 text-lg border rounded border-danger-500 text-white rb-zeplin-focused remove-phone"
                                    disabled>
                                    <iconify-icon icon="fluent:delete-20-regular"></iconify-icon>
                                </button>
                            </div>
                        </div>

                        <button type="button" id="add-phone" class="btn btn-sm btn-secondary pt-2">
                            + Tambah Nomor
                        </button>

                        @error('phone_numbers.*')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('add-phone').addEventListener('click', function () {
            const wrapper = document.getElementById('phone-wrapper');

            const div = document.createElement('div');
            div.classList.add('d-flex', 'mb-2');

            div.innerHTML = `
            <div class="flex justify-between items-end space-x-6" id="phone-wrapper">
                                <div class="input-area w-full">
                                    <input type="tel" class="form-control" name="phone_numbers[]"
                                        placeholder="Nomor telephone">
                                </div>
                                <button
                                    class="inline-flex items-center justify-center h-10 w-10 bg-danger-500 text-lg border rounded border-danger-500 text-white rb-zeplin-focused remove-phone"
                                    >
                                    <iconify-icon icon="fluent:delete-20-regular"></iconify-icon>
                                </button>
                            </div>
        `;

            wrapper.appendChild(div);
        });

        document.addEventListener('click', function (e) {
            if (e.target.classList.contains('remove-phone')) {
                e.target.parentElement.remove();
            }
        });
    </script>

</x-applayouts>