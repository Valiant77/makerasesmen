<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Absen;

class VerifikasiController extends Controller
{
    public function show()
    {
        $query = Absen::where('status', 'Menunggu')->with('user');
        if (request()->has('query') && request()->get('query')) {
            $input = request()->get('query');
            $query->whereHas('user', function ($q) use ($input) {
                $q->where('name', 'LIKE', "%$input%");
            });
        }
        $absenFalse = $query->get();
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
