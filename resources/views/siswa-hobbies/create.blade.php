<x-applayouts>
    <div class="card">
        <div class="card-body flex flex-col p-6">
            <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                <div class="flex-1">
                    <div class="card-title text-slate-900 dark:text-white">Tambah Hobi Siswa</div>
                </div>
                <a href="/siswa-hobi" class="btn inline-flex justify-center btn-primary active">
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
                <form action="/siswa-hobi" method="post" class="space-y-4">
                    @csrf
                    @method('POST')
                    <div>
                        <label for="siswas_id" class="form-label">Pilih Siswa:</label>
                        <select name="siswas_id" id="basicSelect" class="form-control w-full mt-2">
                            <option selected="Selected" disabled="disabled" value="none"
                                class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">Select an option
                            </option>

                            @foreach($siswas as $siswa)
                                <option value="{{ $siswa->id }}">{{ $siswa->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="hobbies" class="form-label">Pilih Hobi</label>
                        <select name="hobbies_id[]" id="hobbies" class="select2 form-control w-full mt-2 py-2" multiple>

                            @foreach ($hobbies as $hobi)
                                <option value="{{ $hobi->id }}">
                                    {{ $hobi->hobby }}
                                </option>
                            @endforeach

                        </select>
                    </div>
                    <button class="btn flex justify-center btn-dark ml-auto">Submit</button>
                </form>
            </div>
        </div>
    </div>

</x-applayouts>