<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RekapExport;
use App\Models\User;
use App\Models\Absen;

class AbsenController extends Controller
{
    /**
     * Display attendance for a specific user.
     */
    public function show($id)
    {
        $admin = auth()->user();
        $user = User::findOrFail($id);
        $absenTrue = Absen::where('user_id', $id)->get();
        $totalHadirSeluruh = Absen::where('user_id', $id)->where('status', 'Diterima')->whereIn('kategori', ['Hadir', 'Hadir Telat', 'Telat'])->count();
        $totalTidakHadirSeluruh = Absen::where('user_id', $id)->where('status', 'Diterima')->whereIn('kategori', ['Sakit', 'Izin'])->count();
        $amount = Absen::where('status', 'Menunggu')->count();
        $message = 'Halaman ini menampilkan rekapitulasi absensi ' . $user->name . '';
        return view('rekap', compact('user', 'absenTrue', 'totalHadirSeluruh', 'totalTidakHadirSeluruh', 'amount', 'admin', 'message'));
    }

    public function export($userId)
    {
        return Excel::download(new RekapExport($userId), 'rekap-absen-' . $userId . '.xlsx');
    }
}
