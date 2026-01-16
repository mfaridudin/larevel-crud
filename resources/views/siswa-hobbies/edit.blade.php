<x-applayouts>
    <div class="card">
        <div class="card-body p-6">

            <form action="{{ route('siswa-hobi.update', $siswa->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <input type="text" name="nama" value="{{ $siswa->nama }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="hobbies">Pilih Hobi</label>
                    <select name="hobbies[]" id="hobbies" class="select2 form-control" multiple>
                        @foreach ($all_hobbies as $hobi)
                            <option value="{{ $hobi->id }}" {{ in_array($hobi->id, $siswa_hobbies_ids) ? 'selected' : '' }}>
                                {{ $hobi->hobby }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button class="btn btn-dark">Submit</button>
            </form>

        </div>
    </div>
</x-applayouts>