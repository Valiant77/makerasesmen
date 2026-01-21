<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role', 'user')->get();
        return view('user', compact('users'));
    }

    public function create()
    {
        return view('anggotaform');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'nullable|string|max:255',
            'username' => 'nullable|string|max:255|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'no_telp' => 'nullable|string|max:20',
            'password' => 'required|min:8|confirmed',
        ]);

        $data['password'] = bcrypt($data['password']);
        $data['role'] = 'user';
        $data['pin'] = random_int(100000, 999999);

        User::create($data);

        return redirect()->route('user.index');
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('user.index');
    }
}
