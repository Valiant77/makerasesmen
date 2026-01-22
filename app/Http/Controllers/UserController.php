<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    #index
    public function index()
    {
        $users = User::where('role', 'user')->get();
        return view('user', compact('users'));
    }

    #the create
    public function create(Request $request)
    {
        $role = $request->route()->getName() === 'admin.create' ? 'admin' : 'user';
        return view('userform', compact('role'));
    }
    public function store(Request $request)
    {
        $role = $request->route()->getName() === 'admin.store' ? 'admin' : 'user';
    
        $data = $request->validate([
            'name' => 'nullable|string|max:255',
            'username' => 'nullable|string|max:255|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'no_telp' => 'nullable|string|max:20',
            'password' => 'required|min:8|confirmed',
        ]);

        $data['password'] = bcrypt($data['password']);
        $data['pin'] = random_int(100000, 999999);
        $data['role'] = $role;
        $data['remember_token'] = \Str::random(10);

        User::create($data);

        return redirect()->route($role === 'admin' ? 'profil' : 'user.index');
    }

    #the update
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $role = $user->role;
        return view('userform', compact('user', 'role'));
    }
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $data = $request->validate([
            'name' => 'nullable|string|max:255',
            'username' => 'nullable|string|max:255|unique:users,username,' . $user->id,
            'email' => 'required|email|unique:users,email,' . $user->id,
            'no_telp' => 'nullable|string|max:20',
            'password' => 'nullable|min:8|confirmed',
        ]);

        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);

        return redirect()->route('user.index');
    }

    #the DESTROYER!!!!
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('user.index');
    }
}
