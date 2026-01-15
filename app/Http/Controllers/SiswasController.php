<?php

namespace App\Http\Controllers;

use App\Models\siswas;
use Illuminate\Http\Request;

class SiswasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $siswas = siswas::get();

        $siswas = Siswas::with('phone_numbers')->get();

        return view('siswas.siswas', compact('siswas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('siswas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'phone_numbers' => 'nullable|array',
            'phone_numbers.*' => 'numeric|distinct|unique:phone_numbers,phone_number',
        ]);

        $siswa = Siswas::create([
            'nama' => $request->nama,
        ]);

        if ($request->phone_numbers) {
            foreach ($request->phone_numbers as $phone) {
                $siswa->phone_numbers()->create([
                    'phone_number' => $phone,
                ]);
            }
        }

        return redirect('/siswas')->with('message', 'Data berhasil disimpan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $siswas = Siswas::with('phone_numbers')->findOrFail($id);

        return view('siswas.edit', compact('siswas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $siswa = Siswas::findOrFail($id);

        $phoneId1 = $siswa->phone_numbers->get(0)?->id;
        $phoneId2 = $siswa->phone_numbers->get(1)?->id;

        $request->validate([
            'nama' => 'required|string',
            'no_telp_1' => "nullable|numeric|unique:phone_numbers,phone_number,{$phoneId1}",
            'no_telp_2' => "nullable|numeric|unique:phone_numbers,phone_number,{$phoneId2}|different:no_telp_1",
        ]);

        $siswa->update([
            'nama' => $request->nama,
        ]);

        if ($request->no_telp_1) {
            $siswa->phone_numbers()->updateOrCreate(
                ['id' => $phoneId1],
                ['phone_number' => $request->no_telp_1]
            );
        }

        if ($request->no_telp_2) {
            $siswa->phone_numbers()->updateOrCreate(
                ['id' => $phoneId2],
                ['phone_number' => $request->no_telp_2]
            );
        }

        return redirect('/siswas')->with('message', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $siswa = Siswas::findOrFail($id);

        $siswa->delete();

        return redirect('/siswas')->with('message', 'data siswa berhasil dihapus');
    }
}
