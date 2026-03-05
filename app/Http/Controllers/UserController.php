<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::with('role')->latest()->get();

        $statistics = [
            'total' => $users->count(),
            'withRole' => $users->filter(fn (User $user): bool => $user->role !== null)->count(),
            'superAdmins' => $users->filter(function (User $user): bool {
                return strtolower($user->role?->role_name ?? '') === 'superadmin';
            })->count(),
            'lastCreated' => $users->sortByDesc('created_at')->first(),
        ];

        return view('users.index', [
            'users' => $users,
            'statistics' => $statistics,
        ]);
    }

    public function create(): View
    {
        $roles = Role::query()->orderBy('role_name')->get();

        return view('users.create', compact('roles'));
    }

    public function store(StoreUserRequest $request): RedirectResponse
    {
        User::create($request->validated());

        Alert::success('Berhasil', 'Pengguna baru berhasil ditambahkan.');

        return redirect()->route('users.index');
    }

    public function show(User $user): View
    {
        $user->load('role');

        return view('users.profile', compact('user'));
    }

    public function edit(User $user): View
    {
        $roles = Role::query()->orderBy('role_name')->get();

        return view('users.edit', compact('user', 'roles'));
    }

    public function update(UpdateUserRequest $request, User $user): RedirectResponse
    {
        $data = $request->validated();

        if (empty($data['password'])) {
            unset($data['password']);
        }

        $user->update($data);

        Alert::success('Berhasil', 'Data pengguna berhasil diperbarui.');

        return redirect()->route('users.index');
    }

    public function destroy(User $user): RedirectResponse
    {
        if ($user->getKey() === auth()->id()) {
            Alert::error('Gagal', 'Anda tidak dapat menghapus akun sendiri.');

            return redirect()->route('users.index');
        }

        $user->delete();

        Alert::success('Berhasil', 'Pengguna berhasil dihapus.');

        return redirect()->route('users.index');
    }
}
