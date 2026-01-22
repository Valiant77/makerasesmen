<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    //hasmany stuff and shit i forgot
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
