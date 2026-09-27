<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class Latihan6Controller extends Controller
{
    public function fillableDemo(Request $request)
    {
        // Simulasi data yang dikirim oleh pengguna
        $dataBerbahaya = [
            'name' => 'Dzul',
            'email' => 'dzul@example.com',
            'role' => 'admin',
        ];

        // Membuat instance User tanpa menyimpan ke database
        $user = new User();

        // Mengisi data menggunakan mass assignment
        $user->fill($dataBerbahaya);

        return response()->json([
            'data_dikirim' => $dataBerbahaya,
            'data_terisi' => $user->getAttributes(),
            'role_hasil' => $user->role,
            'pesan' => 'Atribut role tidak diizinkan melalui $fillable.',
        ]);
    }
}