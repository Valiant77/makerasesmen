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
        $absen = Absen::where('user_id', $id)->get();
        
        return view('rekap', compact('user', 'absen'));
    }
}
