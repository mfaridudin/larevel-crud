<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $data_user = new User;

        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
            'password_confirmation' => 'required|string|same:password',
        ];

        $messages = [
            'name.required' => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 8 karakter.',
            'password_confirmation.required' => 'Konfirmasi password wajib diisi',
            'password_confirmation.same' => 'Konfirmasi password tidak sama',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'false',
                'message' => 'Proses Validasi error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data_user->name = $request->name;
        $data_user->email = $request->email;
        $data_user->password = Hash::make($request->password);
        $data_user->save();

        return response()->json([
            'status' => 'true',
            'message' => 'Register berhasil',
            'data' => $data_user,
        ], 201);
    }

    public function login(Request $request)
    {
        $rules = [
            'email' => 'required|string|email',
            'password' => 'required|string|min:8',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'false',
                'message' => 'Proses Login gagal',
                'errors' => $validator->errors(),
            ], 422);
        }

        if (! Auth::attempt($request->only(['email', 'password']))) {
            return response()->json([
                'status' => 'false',
                'message' => 'Email atau Password tidak sesuai',
            ], 401);
        }

        $data_user = User::where('email', $request->email)->first();

        return response()->json([
            'status' => 'true',
            'message' => 'Login berhasil',
            'token' => $data_user->createToken('api_token')->plainTextToken,
        ], 200);

    }
}
