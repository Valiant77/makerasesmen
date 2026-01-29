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
    public function show(Request $request, $id)
{
    $admin = auth()->user();
    $user = User::findOrFail($id);

    // BASE QUERY (single source of truth)
    $absenQuery = Absen::where('user_id', $id)->where('status', 'Diterima');

    // DATE FILTER (from frontend form)
    if ($request->filled('from')) {
        $absenQuery->whereDate('created_at', '>=', $request->from);
    }
    if ($request->filled('to')) {
        $absenQuery->whereDate('created_at', '<=', $request->to);
    }

    // DATA
    $absenTrue = (clone $absenQuery)->orderBy('created_at', 'desc')->get();
    $latest = (clone $absenQuery)->latest()->first();

    // COUNTS
    $totalHadirSeluruh = (clone $absenQuery)->whereIn('kategori', ['Hadir', 'Hadir Telat', 'Telat'])->count();
    $totalTidakHadirSeluruh = (clone $absenQuery)->whereIn('kategori', ['Sakit', 'Izin'])->count();

    // unrelated global count
    $amount = Absen::where('status', 'Menunggu')->count();
    $message = 'Halaman ini menampilkan rekapitulasi absensi ' . $user->name;

    return view('rekap', compact( 'user', 'absenTrue', 'latest',
        'totalHadirSeluruh', 'totalTidakHadirSeluruh',
        'amount', 'admin', 'message'
    ));
}


    public function export($id)
    {
        $user = User::findOrFail($id);    
        return Excel::download(new RekapExport($id), 'rekap-absen-' . $user->name . '.xlsx');
    }
}
