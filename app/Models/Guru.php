<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    public function lembaga()
    {
        return $this->belongsTo(Lembaga::class);
    }
    protected $guarded = [];
}
