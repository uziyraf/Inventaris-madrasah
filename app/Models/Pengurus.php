<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengurus extends Model
{
    public function lembaga()
    {
        return $this->belongsTo(Lembaga::class);
    }

    protected $guarded = [];
}
