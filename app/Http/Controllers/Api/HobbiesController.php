<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\hobbies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HobbiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hobbies = hobbies::all();

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
        $hobbies = new hobbies;

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

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $hobbies = hobbies::findOrFail($id);

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
        $hobbies = hobbies::findOrFail($id);
        $hobbies->delete();

        return response()->json([
            'status' => true,
            'message' => 'Hobby berhasil dihapus',
        ], 200);
    }
}
