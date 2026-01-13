<?php

namespace App\Http\Controllers;

use App\Models\hobbies;
use Illuminate\Http\Request;

class HobbiesController extends Controller
{
    public function index()
    {
        $hobbies = hobbies::get();

        return view('hobbies', compact('hobbies'));
    }

    // create
    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_hobi' => 'required|max:50',
        ], [
            'nama_hobi.required' => 'Nama Hobi Wajib Diisi',
            'nama_hobi.max' => 'Nama Hobi Maximal 50 karakter',
        ]);

        // dd($request);

        hobbies::create([
            'hobby' => $request->nama_hobi,
        ]);

        return redirect('/hobbies')->with('message', 'Hobi berhasil ditambah');
    }

    // update
    public function edit(string $id)
    {
        $hobby = hobbies::findOrFail($id);

        return view('edit', compact('hobby'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_hobi' => 'required|max:50',
        ], [
            'nama_hobi.required' => 'Nama Hobi Wajib Diisi',
            'nama_hobi.max' => 'Nama Hobi Maximal 50 karakter',
        ]);

        // dd($request);

        $hobby = hobbies::findOrFail($id);

        $hobby->update([
            'hobby' => $request->nama_hobi,
        ]);

        return redirect('/hobbies')->with('message', 'Hobi berhasil diupdate');
    }

    // hapus
    public function destroy(string $id)
    {

        $hobby = hobbies::findOrFail($id);

        $hobby->delete();

        return redirect('/hobbies')->with('message', 'Hobi berhasil dihapus');
    }
}
