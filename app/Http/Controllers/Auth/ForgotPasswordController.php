<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;

class ForgotPasswordController extends Controller
{
    /**
     * Menampilkan form lupa password.
     */
    public function index(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Mengirim link reset password ke email.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status === Password::RESET_LINK_SENT) {
            return back()->with('toast', [
                'type' => 'success',
                'message' => __($status),
            ]);
        }

        return back()
            ->withInput()
            ->withErrors([
                'email' => __($status),
            ])
            ->with('toast', [
                'type' => 'error',
                'message' => __($status),
            ]);
    }
}
