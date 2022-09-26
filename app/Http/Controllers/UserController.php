<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index', [
            'users' => User::all(),
        ]);
    }

    public function edit(User $user)
    {
        return view('users.edit', [
            'user' => $user,
            'roles' => Role::all(),
        ]);
    }

    public function update(User $user, Request $request)
    {
        $request->validate([
            'roles' => 'exists:roles,id',
        ]);

        $user->roles()->sync($request->roles);

        return redirect('/users');
    }
}
