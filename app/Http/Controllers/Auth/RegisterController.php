<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class RegisterController extends Controller
{
    /**
     * Menampilkan form registrasi.
     */
    public function show(): View
    {
        return view('auth.register');
    }

    /**
     * Memproses pendaftaran akun baru.
     */
    public function store(RegisterRequest $request): RedirectResponse
    {

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Auto login setelah berhasil mendaftar
        Auth::login($user);

        return redirect()->route('dashboard');
    }
}
