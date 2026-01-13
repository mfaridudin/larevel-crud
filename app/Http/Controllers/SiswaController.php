<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswa = siswa::get();

        return view('siswa.siswa', compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_siswa' => 'required|max:50',
            'nisn_siswa' => 'required|min:10|unique:nisn,nisn',
        ], [
            'nama_siswa.required' => 'Nama wajib diisi',
            'nama_siswa.max' => 'Nama siswa maksimal 50 karakter!',
            'nisn_siswa.required' => 'NISN wajib diisi',
            'nisn_siswa.min' => 'NISN siswa minimal 10 karakter!',
            'nisn_siswa.unique' => 'NISN sudah digunakan',
        ]);

        $siswa = Siswa::create([
            'nama' => $request->nama_siswa,
        ]);

        $siswa->nisn()->create([
            'nisn' => $request->nisn_siswa,
        ]);

        return redirect('/siswa')->with('message', 'data berhasil ditambah');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $siswa = siswa::findOrFail($id);

        return view('siswa.edit', compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_siswa' => 'required|max:50',
            'nisn_siswa' => 'required|min:10|unique:nisn,nisn,'.$id.',siswa_id',
        ], [
            'nama_siswa.required' => 'Nama wajib diisi',
            'nama_siswa.max' => 'Nama siswa maksimal 50 karakter!',
            'nisn_siswa.required' => 'NISN wajib diisi',
            'nisn_siswa.min' => 'NISN siswa minimal 10 karakter!',
            'nisn_siswa.unique' => 'NISN sudah digunakan',
        ]);

        $siswa = Siswa::findOrFail($id);

        $siswa->update([
            'nama' => $request->nama_siswa,
        ]);

        $siswa->nisn()->updateOrCreate(
            ['siswa_id' => $siswa->id],
            ['nisn' => $request->nisn_siswa]
        );

        return redirect('/siswa')->with('message', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $hobby = siswa::findOrFail($id);

        $hobby->delete();

        return redirect('/siswa')->with('message', 'data siswa berhasil dihapus');
    }
}
