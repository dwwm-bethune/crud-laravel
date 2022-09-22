<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
        return view('auth.profile');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$request->user()->id,
            'password' => 'nullable|min:6|confirmed',
        ]);

        $data = ['name' => $request->name, 'email' => $request->email];

        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }

        $request->user()->update($data);

        return redirect()->intended();
    }
}
