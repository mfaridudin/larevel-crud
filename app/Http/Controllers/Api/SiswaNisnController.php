<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SiswaNisnController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswa = siswa::with('nisn')->get();

        return response()->json([
            'status' => 'true',
            'massage' => 'List data siswa & nisn',
            'data' => $siswa,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $siswa = new siswa;

        $rules = [
            'nama_siswa' => 'required|max:50',
            'nisn_siswa' => 'required|min:10|unique:nisn,nisn',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'false',
                'message' => 'Proses Validasi error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $siswa->nama = $request->nama_siswa;
        $siswa->save();

        $siswa->nisn()->create([
            'nisn' => $request->nisn_siswa,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Siswa & NISN berhasil ditambahkan',
            'data' => [
                'siswa' => $siswa,
                'nisn' => $siswa->nisn,
            ],
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $siswa = siswa::with('nisn')->findOrFail($id);

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
        $siswa = siswa::findOrFail($id);

        $rules = [
            'nama_siswa' => 'required|max:50',
            'nisn_siswa' => 'required|min:10|unique:nisn,nisn',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'false',
                'message' => 'Proses Validasi error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $siswa->nama = $request->nama_siswa;
        $siswa->save();

        $siswa->nisn()->create([
            'nisn' => $request->nisn_siswa,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Siswa & NISN berhasil diupdate',
            'data' => [
                'siswa' => $siswa,
                'nisn' => $siswa->nisn,
            ],
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $siswa = siswa::findOrFail($id);
        $siswa->delete();

        return response()->json([
            'status' => true,
            'message' => 'Data Siswa & NISN berhasil dihapus',
        ], 200);
    }
}
