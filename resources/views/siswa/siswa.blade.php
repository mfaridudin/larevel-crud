<x-applayouts>

    @if (session('message'))
        <div class="alert alert-primary" role="alert">
            {{ session('message') }}
        </div>
    @endif

    <div class="card">
        <header class="card-header noborder">
            <h4 class="card-title">Tabel Siswa</h4>

            <div class="btn-group-example btn-group">
                <a href="/siswa/create" class="btn inline-flex justify-center btn-primary">Tambah Siswa</a>
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
                                        NISN
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
                                @forelse ($siswa as $item)
                                    <tr>
                                        <td class="table-td">{{ $loop->iteration }}</td>
                                        <td class="table-td ">{{ $item->nama }}</td>

                                        <td class="table-td ">{{ $item->nisn->nisn }}</td>
                                        <td class="table-td ">
                                            {{ $item->created_at }}
                                        </td>
                                        <td class="table-td ">
                                            <div class="flex space-x-3 rtl:space-x-reverse">
                                                <a href="/siswa/{{ $item->id }}/edit" class="action-btn" type="button">
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
                                                <button data-bs-toggle="modal" data-bs-target="#basic_modal"
                                                    class="action-btn" data-id="{{ $item->id }}">
                                                    <iconify-icon icon="heroicons:trash"><template shadowrootmode="open">
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

    <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
        id="basic_modal" tabindex="-1" aria-labelledby="basic_modal" aria-hidden="true">
        <!-- BEGIN: Modal -->
        <div class="modal-dialog relative w-auto pointer-events-none">
            <div
                class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                <div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
                    <!-- Modal header -->
                    <div
                        class="flex items-center justify-between p-5 border-b rounded-t dark:border-slate-600 bg-red-500">
                        <h3 class="text-xl font-medium text-white dark:text-white capitalize">
                            Modal Hapus
                        </h3>
                        <button type="button"
                            class="text-slate-400 bg-transparent hover:text-slate-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-slate-600 dark:hover:text-white"
                            data-bs-dismiss="modal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="#ffffff" viewbox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-6 space-y-4">
                        <p class="text-base text-slate-600 dark:text-slate-400 leading-6">
                            Yakin ingin menghapus item ini?
                        </p>
                    </div>
                    <!-- Modal footer -->
                    <div
                        class="flex items-center justify-end p-6 space-x-2 border-t border-slate-200 rounded-b dark:border-slate-600">
                        <button type="button" class="btn btn-warning inline-flex justify-center text-white"
                            data-bs-dismiss="modal">
                            Batal
                        </button>
                        <form id="delete-form" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger inline-flex justify-center text-white">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Modals -->
    </div>


    <script>
        document.addEventListener('show.bs.modal', function (e) {
            if (e.target.id !== 'basic_modal') return;

            const button = e.relatedTarget;
            const id = button?.getAttribute('data-id');
            const form = document.getElementById('delete-form');

            if (id && form) {
                form.action = `/siswa/${id}/`;
            }
        });
    </script>
</x-applayouts>