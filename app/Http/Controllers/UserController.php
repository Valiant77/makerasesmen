<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use App\Models\User;
use App\Models\Absen;

class UserController extends Controller
{
    #index
    public function index()
    {
        $query = User::where('role', 'user');

        if (request()->has('query') && request()->get('query')) {
            $input = request()->get('query');
            $query->where('name', 'LIKE', "%$input%")
                ->orWhere('username', 'LIKE', "%$input%")
                ->orWhere('email', 'LIKE', "%$input%")
                ->orWhere('no_telp', 'LIKE', "%$input%");
        }

        $admin = auth()->user();
        $users = $query->get();
        $amount = Absen::where('status', 'Menunggu')->count();
        $message = 'Halaman ini berisi daftar seluruh pengguna yang terdaftar dalam sistem. Tercatat ada ' . $users->count() . ' pengguna.';
        return view('user', compact('users', 'amount', 'admin', 'message'));
    }

    #the create
    public function create(Request $request)
    {
        $admin = auth()->user();
        $role = $request->route()->getName() === 'admin.create' ? 'admin' : 'user';
        $amount = Absen::where('status', 'Menunggu')->count();
        $message = 'Halaman ini digunakan untuk menambahkan pengguna baru ke dalam sistem.';
        return view('userform', compact('role', 'amount', 'admin', 'message'));
    }
    public function store(Request $request)
    {
        $role = $request->route()->getName() === 'admin.store' ? 'admin' : 'user';
    
        $data = $request->validate([
            'name' => 'nullable|string|max:255',
            'username' => 'nullable|string|max:255|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'photos' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'no_telp' => 'nullable|string|max:20',
            'password' => 'required|min:8|confirmed',
            'pin' => 'nullable|digits:6',
        ]);

        if ($request->hasFile('photos')) {
            $data['photos'] = $request->file('photos')->store('profile_photos', 'public');
        }
        if ($role === 'admin') {
            $data['pin'] = '000000'; // default pin for admin
        }

        $data['password'] = bcrypt($data['password']);
        $data['role'] = $role;
        $data['remember_token'] = \Str::random(10);

        User::create($data);

        return redirect()->route($role === 'admin' ? 'profil' : 'user.index');
    }

    #the update
    public function edit($id)
    {
        $admin = auth()->user();
        $user = User::findOrFail($id);
        $role = $user->role;
        $amount = Absen::where('status', 'Menunggu')->count();
        $message = 'Halaman ini digunakan untuk mengedit informasi pengguna.';
        return view('userform', compact('user', 'role', 'amount', 'admin', 'message'));
    }
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $data = $request->validate([
            'name' => 'nullable|string|max:255',
            'username' => 'nullable|string|max:255|unique:users,username,' . $user->id,
            'email' => 'required|email|unique:users,email,' . $user->id,
            'photos' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'no_telp' => 'nullable|string|max:20',
            'old_password' => 'nullable|string',
            'password' => 'nullable|min:8',
            'pin' => 'nullable|digits:6',
        ]);
        
        if ($request->hasFile('photos')) {
            if ($user->photos) {
                \Storage::disk('public')->delete($user->photos);
            }
            $data['photos'] = $request->file('photos')->store('profile_photos', 'public');
        }

        if (!empty($data['old_password'])) {
            if (!\Hash::check($data['old_password'], $user->password)) {
                return redirect()->back()->withErrors(['old_password' => 'Password lama tidak sesuai']);
            }
        }

        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }
        
        unset($data['old_password']);
    
        $user->update($data);

        return redirect()->route('user.index');
    }

    #the DESTROYER!!!!
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('user.index');
    }

    public function profil()
    {
        $admin = User::findOrFail(auth()->user()->id);
        $amount = Absen::where('status', 'Menunggu')->count();
        $message = 'Halaman ini berisi informasi profil Anda.';
        return view('profil', compact('admin', 'amount', 'message'));
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'pengguna.xlsx');
    }
}
