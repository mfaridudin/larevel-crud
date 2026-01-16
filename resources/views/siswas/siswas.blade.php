<x-applayouts>

    <div class="card">
        <header class="card-header noborder">
            <h4 class="card-title">Tabel Siswa</h4>

            <div class="btn-group-example btn-group">
                <a href="/siswas/create" class="btn inline-flex justify-center btn-primary">Tambah Siswa</a>
            </div>
        </header>

        <div class="card-body px-6 pb-6">
            <div class="overflow-x-auto -mx-6 dashcode-data-table">
                <div class="inline-block min-w-full align-middle">
                    <div class="overflow-hidden">
                        <table
                            class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700 data-table">

                            <!-- TABLE HEADER -->
                            <thead class="bg-slate-200 dark:bg-slate-700">
                                <tr>

                                    <th scope="col" class=" table-th ">
                                        No
                                    </th>

                                    <th scope="col" class=" table-th ">
                                        Nama
                                    </th>

                                    <th scope="col" class=" table-th ">
                                        Phone Number
                                    </th>

                                    <th scope="col" class=" table-th ">
                                        Date
                                    </th>

                                    <th scope="col" class=" table-th ">
                                        Action
                                    </th>

                                </tr>
                            </thead>

                            <!-- TABLE BODY -->
                            <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                @forelse ($siswas as $item)
                                    <tr>
                                        <td class="table-td">{{ $loop->iteration }}</td>
                                        <td class="table-td ">{{ $item->nama }}</td>

                                        <td class="table-td ">
                                            {{ $item->phone_numbers->pluck('phone_number')->implode(', ') }}
                                        </td>
                                        <td class="table-td ">
                                            {{ $item->created_at }}
                                        </td>
                                        <td class="table-td ">
                                            <div class="flex space-x-3 rtl:space-x-reverse">
                                                <a href="/siswas/{{ $item->id }}/edit" class="action-btn" type="button">
                                                    <iconify-icon icon="heroicons:pencil-square"><template
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
                                                            </style><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                                                height="1em" viewBox="0 0 24 24">
                                                                <path fill="none" stroke="currentColor"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="1.5"
                                                                    d="m16.862 4.487l1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10">
                                                                </path>
                                                            </svg>
                                                        </template></iconify-icon>
                                                </a>
                                                <form action="/siswas/{{ $item->id }}/" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="action-btn" type="submit">
                                                        <iconify-icon icon="heroicons:trash"><template
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
                                                                </style><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                                                    height="1em" viewBox="0 0 24 24">
                                                                    <path fill="none" stroke="currentColor"
                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="1.5"
                                                                        d="m14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21q.512.078 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48 48 0 0 0-3.478-.397m-12 .562q.51-.088 1.022-.165m0 0a48 48 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a52 52 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a49 49 0 0 0-7.5 0">
                                                                    </path>
                                                                </svg>
                                                            </template></iconify-icon>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">
                                            data siswa belum ada
                                        </td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form action="/logout" method="post">
        @csrf
        <button type="submit">logout</button>
    </form>
</x-applayouts>