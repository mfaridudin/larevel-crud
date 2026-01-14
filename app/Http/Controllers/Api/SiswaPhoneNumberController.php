<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\siswas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SiswaPhoneNumberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswas = Siswas::with('phone_numbers')->get();

        return response()->json([
            'status' => 'true',
            'massage' => 'List data siswa & nisn',
            'data' => $siswas,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $siswa = new siswas;

        $rules = [
            'nama' => 'required|string',
            'no_telp_1' => 'nullable|numeric|unique:phone_numbers,phone_number',
            'no_telp_2' => 'nullable|numeric|unique:phone_numbers,phone_number|different:no_telp_1',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Proses Validasi error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $siswa = Siswas::create([
            'nama' => $request->nama,
        ]);

        if ($request->no_telp_1) {
            $siswa->phone_numbers()->create([
                'phone_number' => $request->no_telp_1,
            ]);
        }

        if ($request->no_telp_2) {
            $siswa->phone_numbers()->create([
                'phone_number' => $request->no_telp_2,
            ]);
        }

        $siswa->load('phone_numbers');

        return response()->json([
            'status' => true,
            'message' => 'Siswa & No Telp berhasil ditambahkan',
            'data' => $siswa,
        ], 201);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $siswa = siswas::findOrFail($id);

        $phoneId1 = $siswa->phone_numbers->get(0)?->id;
        $phoneId2 = $siswa->phone_numbers->get(1)?->id;

        $rules = [
            'nama' => 'required|string',
            'no_telp_1' => "nullable|numeric|unique:phone_numbers,phone_number,{$phoneId1}",
            'no_telp_2' => "nullable|numeric|unique:phone_numbers,phone_number,{$phoneId2}|different:no_telp_1",
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Proses Validasi error',
                'errors' => $validator->errors(),
            ], 422);
        }

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

        return response()->json([
            'status' => true,
            'message' => 'Siswa & No Telp berhasil diupdate',
            'data' => $siswa,
        ], 200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $siswa = siswas::findOrFail($id);
        $siswa->delete();

        return response()->json([
            'status' => true,
            'message' => 'Data Siswa & No Telp berhasil dihapus',
        ], 200);
    }
}
