<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Absen;

class MonitorController extends Controller
{
    public function show()
    {
        $admin = User::findOrFail(auth()->user()->id);
        $amount = Absen::where('status', 'Menunggu')->count();
        $message = 'Halaman ini berisi pengawasan aktivitas pengguna secara real-time.';
        $users = User::where('role', 'user')->get();
        
        // Get the latest absen for each user
        $absens = Absen::whereIn('user_id', $users->pluck('id'))
            // ->groupBy('user_id')
            // ->selectRaw('*, MAX(created_at) as latest_created')
            // ->orderBy('latest_created', 'desc')
            ->get();
        
        return view('monitoring', compact('admin', 'amount', 'message', 'users', 'absens'));
    }
}
