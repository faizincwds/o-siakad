<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\UpdatePasswordRequest;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ResetPasswordController extends Controller
{
    /**
     * Menampilkan form reset password.
     */
    public function index(Request $request): View
    {
        return view('auth.reset-password', [
            'request' => $request,
        ]);
    }

    /**
     * Menyimpan password baru.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'token' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        $status = Password::reset(
            $request->only(
                'email',
                'password',
                'password_confirmation',
                'token'
            ),
            function ($user, $password) {

                $user->forceFill([
                    'password' => Hash::make($password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        if ($status === Password::PASSWORD_RESET) {

            return redirect()
                ->route('login')
                ->with('toast', [
                    'type' => 'success',
                    'message' => 'Password berhasil direset.',
                ]);
        }

        return back()
            ->withInput()
            ->with('toast', [
                'type' => 'error',
                'message' => __($status),
            ]);
    }

    public function update(UpdatePasswordRequest $request): RedirectResponse
    {
        dd($request->all());
        $request->user()->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()
            ->route('settings')
            ->with('toast', [
                'type' => 'success',
                'message' => 'Password berhasil diperbarui.',
        ]);
    }
}
