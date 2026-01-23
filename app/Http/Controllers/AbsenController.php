<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Absen;

class AbsenController extends Controller
{
    /**
     * Display attendance for a specific user.
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        $absenTrue = Absen::where('user_id', $id)->where('status', 'Diterima')->get();
        $totalHadirSeluruh = Absen::where('user_id', $id)->where('status', 'Diterima')->whereIn('kategori', ['Hadir', 'Hadir Telat', 'Telat'])->count();
        $totalTidakHadirSeluruh = Absen::where('user_id', $id)->where('status', 'Diterima')->whereIn('kategori', ['Sakit', 'Izin'])->count();
        $amount = Absen::where('status', 'Menunggu')->count();
        return view('rekap', compact('user', 'absenTrue', 'totalHadirSeluruh', 'totalTidakHadirSeluruh', 'amount'));
    }
}
