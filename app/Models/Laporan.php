<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $fillable = [
        'lembaga_id',
        'nama',
        'madrasah',
        'masa_laporan',
        'tahun',
        'tanggal_submit',
        'file',
        'status',
    ];
}
