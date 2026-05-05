<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{
    use HasFactory;

    // Pastikan lembaga_id udah masuk di fillable ya kalau lu mau nyimpen datanya
    protected $fillable = [
        'lembaga_id',
        'no_induk',
        'nama_santri',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'kelas',
        'nama_orangtua',
        'asal_madin'
    ];

    // ===== TAMBAHIN KODE INI DI BAWAH =====
    public function lembaga()
    {
        // Artinya: 1 Santri itu milik (belongsTo) 1 Lembaga
        return $this->belongsTo(Lembaga::class, 'lembaga_id');
    }
}