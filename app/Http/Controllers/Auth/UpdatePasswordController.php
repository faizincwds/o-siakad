<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\UpdatePasswordRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class UpdatePasswordController extends Controller
{
    /**
     * Update password user yang sedang login.
     */
    public function update(UpdatePasswordRequest $request): RedirectResponse
    {

        $request->user()->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()
            ->route('settings.index')
            ->with('toast', [
                'type' => 'success',
                'message' => 'Password berhasil diperbarui.',
        ]);
    }
}
