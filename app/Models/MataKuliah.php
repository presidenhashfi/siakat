<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    use HasFactory;

    protected $table = 'mata_kuliahs';

    // Kolom yang boleh diisi mass assignment
    protected $fillable = [
        'kode',
        'nama_mk',
        'sks',
        'semester',
        'dosen_pengampu',
    ];

    public function mahasiswa()
    {
        return $this->belongsToMany(Mahasiswa::class, 'mahasiswa_mata_kuliah');
    }
}
