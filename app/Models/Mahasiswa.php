<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    // Kolom yang bisa diisi lewat mass assignment
    protected $fillable = [
    'nim',
    'nama',
    'semester', // ✅ penting
    'jurusan',
    'email',
    ];


    /**
     * Relasi many-to-many ke tabel mata_kuliahs
     * melalui tabel pivot mahasiswa_mata_kuliah
     */
    public function mataKuliah()
    {
        return $this->belongsToMany(
            MataKuliah::class,          // model tujuan relasi
            'mahasiswa_mata_kuliah',    // nama tabel pivot
            'mahasiswa_id',             // foreign key di pivot yang mengarah ke mahasiswa
            'mata_kuliah_id'            // foreign key di pivot yang mengarah ke mata kuliah
        )->withTimestamps();             // otomatis isi created_at & updated_at di pivot
    }
}
