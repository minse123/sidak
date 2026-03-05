<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function showLogin(): View|RedirectResponse
    {
        if (! Auth::check()) {
            return view('auth.login');
        }

        $user = Auth::user();

        if (! $user instanceof User) {
            Auth::logout();

            return view('auth.login');
        }

        return redirect()->intended($this->redirectForRole($user));
    }

    public function login(LoginRequest $request): RedirectResponse
    {
        if (! Auth::attempt($request->only(['email', 'password']), $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }

        $request->session()->regenerate();

        $user = $request->user();

        if ($user instanceof User) {
            return redirect()->intended($this->redirectForRole($user));
        }

        Auth::logout();

        return redirect()->route('login');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    private function redirectForRole(User $user): string
    {
        $roleName = strtolower($user->role?->role_name ?? '');

        if ($roleName === 'superadmin') {
            return route('users.index');
        }

        return route('dashboard.index');
    }
}
