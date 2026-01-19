<?php

namespace App\Http\Controllers;

use App\Models\Hobbies;
use App\Models\siswas;
use Illuminate\Http\Request;

class SiswaHobbiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswa_hobi = siswas::with('hobbies')->get();

        return view('siswa-hobbies.siswaHobbies', compact('siswa_hobi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $siswas = siswas::all();
        $hobbies = Hobbies::all();

        return view('siswa-hobbies.create', compact('siswas', 'hobbies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'siswas_id' => 'required',
            'hobbies_id' => 'required',
        ]);
        $siswa = siswas::findOrFail($request->siswas_id);

        $siswa->hobbies()->attach($request->hobbies_id);

        return redirect('/siswa-hobi')->with('message', 'hobi siswa berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $siswa = siswas::with('hobbies')->findOrFail($id);
        $all_hobbies = Hobbies::all();

        $siswa_hobbies_ids = $siswa->hobbies->pluck('id')->toArray();

        return view('siswa-hobbies.edit', compact('siswa', 'all_hobbies', 'siswa_hobbies_ids'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $siswa = siswas::findOrFail($id);

        $siswa->update([
            'nama' => $request->nama,
        ]);

        $siswa->hobbies()->sync($request->hobbies ?: []);

        return redirect('/siswa-hobi')->with('message', 'hobi siswa berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $siswaId)
    {
        $siswa = siswas::findOrFail($siswaId);

        $siswa->hobbies()->detach($request->hobi_id);

        return redirect('/siswa-hobi')->with('message', 'data hobi siswa berhasil dihapus');
    }
}
