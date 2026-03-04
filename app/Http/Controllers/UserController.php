<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('role')->get();
        $roles = Role::all();

        return view('user.index', compact('users', 'roles'));
    }
}
