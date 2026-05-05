<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventaris extends Model
{
    public function lembaga()
    {
        return $this->belongsTo(Lembaga::class, 'lembaga_id');
    }
    protected $guarded = [];
}
