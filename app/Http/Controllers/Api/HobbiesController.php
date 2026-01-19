<?php

namespace App\Http\Controllers\Api;

use App\Models\Hobbies;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class HobbiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hobbies = Hobbies::all();

        return response()->json([
            'status' => 'true',
            'massage' => 'List data hobby',
            'data' => $hobbies,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $hobbies = new Hobbies;

        $rules = [
            'hobby' => 'required|max:50',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'false',
                'message' => 'Proses Validasi error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $hobbies->hobby = $request->hobby;
        $hobbies->save();

        return response()->json([
            'status' => true,
            'message' => 'Hobi berhasil ditambahkan',
            'data' => $hobbies,
        ], 201);
    }

    public function show(string $id)
    {
        $hobby = Hobbies::findOrFail($id);

        return response()->json([
            'status' => 'true',
            'massage' => 'Detail hobby',
            'data' => $hobby,

        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $hobbies = Hobbies::findOrFail($id);

        $rules = [
            'hobby' => 'required|max:50',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'false',
                'message' => 'Proses Validasi error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $hobbies->hobby = $request->hobby;
        $hobbies->save();

        return response()->json([
            'status' => true,
            'message' => 'Hobi berhasil diupdate',
            'data' => $hobbies,
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $hobbies = Hobbies::findOrFail($id);
        $hobbies->delete();

        return response()->json([
            'status' => true,
            'message' => 'Hobby berhasil dihapus',
        ], 200);
    }
}
