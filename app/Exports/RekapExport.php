<?php

namespace App\Exports;

use App\Models\Absen;
use Maatwebsite\Excel\Concerns\FromCollection;

class RekapExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection($id)
    {
        return Absen::where('user_id', $id)->where('status', 'Diterima')->get();
    }
}
