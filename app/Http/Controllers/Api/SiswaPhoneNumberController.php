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
            'phone_numbers' => 'nullable|array',
            'phone_numbers.*' => 'numeric|distinct|unique:phone_numbers,phone_number',
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

        if ($request->phone_numbers) {
            foreach ($request->phone_numbers as $phone) {
                $siswa->phone_numbers()->create([
                    'phone_number' => $phone,
                ]);
            }
        }

        $siswa->load('phone_numbers');

        return response()->json([
            'status' => true,
            'message' => 'Siswa & No Telp berhasil ditambahkan',
            'data' => $siswa,
        ], 201);

    }

    public function show(string $id)
    {
        $siswa = siswas::with('phone_numbers')->findOrFail($id);

        return response()->json([
            'status' => 'true',
            'massage' => 'Detail siswa',
            'data' => $siswa,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $siswa = siswas::with('phone_numbers')->findOrFail($id);

        // $phoneId1 = $siswa->phone_numbers->get(0)?->id;
        // $phoneId2 = $siswa->phone_numbers->get(1)?->id;

        $rules = [
            'nama' => 'required|string',
            'phone_numbers' => 'nullable|array',
            'phone_numbers.*' => 'numeric|distinct|unique:phone_numbers,phone_number',
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

        if ($request->phone_numbers) {
            
            $siswa->phone_numbers()->delete();

            foreach ($request->phone_numbers as $phone) {
                $siswa->phone_numbers()->create([
                    'phone_number' => $phone,
                ]);
            }
        }

        $siswa->load('phone_numbers');

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
