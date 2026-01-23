<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Absen;

class VerifikasiController extends Controller
{
    public function show()
    {
        $absenFalse = Absen::where('status', 'Menunggu')->with('user')->get();
        $amount = $absenFalse->count();
        return view('verifikasi', compact('absenFalse', 'amount'));
    }
    public function diterima(Request $request, $id)
    {
        Absen::where('id', $id)->update(['status' => 'Diterima']);
        return redirect()->back();
    }
    public function ditolak(Request $request, $id)
    {
        Absen::where('id', $id)->delete();
        return redirect()->back();
    }
}
