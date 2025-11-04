<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{


    /**
     * Menampilkan daftar seluruh mata kuliah
     */
    public function index()
    {
        $mata_kuliah = MataKuliah::paginate(10);
        return view('mata_kuliah.index', compact('mata_kuliah'));
    }

    /**
     * Menampilkan form tambah mata kuliah baru
     */
    public function create()
    {
        return view('mata_kuliah.create');
    }

    /**
     * Menyimpan data mata kuliah baru ke database
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'kode' => 'required|unique:mata_kuliahs,kode',
        'nama_mk' => 'required|string|max:255',
        'sks' => 'required|integer|min:1',
        'semester' => 'required|integer|min:1|max:14',
        'dosen_pengampu' => 'nullable|string|max:255',
    ]);

    MataKuliah::create($validated);

    return redirect()->route('mata_kuliah.index')
        ->with('success', 'Mata kuliah berhasil ditambahkan.');
}

    /**
     * Menampilkan detail 1 mata kuliah beserta mahasiswa yang mengambil
     */
    public function show(MataKuliah $mata_kuliah)
    {
        $mata_kuliah->load('mahasiswa'); // relasi many-to-many
        return view('mata_kuliah.show', compact('mata_kuliah'));
    }

    /**
     * Menampilkan form edit mata kuliah
     */
    public function edit(MataKuliah $mata_kuliah)
    {
        return view('mata_kuliah.edit', compact('mata_kuliah'));
    }

    /**
     * Menyimpan perubahan data mata kuliah
     */
    public function update(Request $request, MataKuliah $mataKuliah)
{
    $validated = $request->validate([
        'kode' => 'required|unique:mata_kuliahs,kode,' . $mataKuliah->id,
        'nama_mk' => 'required|string|max:255',
        'sks' => 'required|integer|min:1',
        'semester' => 'required|integer|min:1|max:14',
        'dosen_pengampu' => 'nullable|string|max:255',
    ]);

    $mataKuliah->update($validated);

    return redirect()->route('mata_kuliah.index')
        ->with('success', 'Data mata kuliah berhasil diperbarui.');
}

    /**
     * Menghapus data mata kuliah
     */
    public function destroy(MataKuliah $mata_kuliah)
    {
        $mata_kuliah->delete();
        return redirect()->route('mata_kuliah.index')->with('success', 'Mata kuliah berhasil dihapus.');
    }
}
