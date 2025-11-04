<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * 🧾 Menampilkan daftar mahasiswa
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::with("mataKuliah")->paginate(10);
        return view("mahasiswa.index", compact("mahasiswa"));
    }

    /**
     * ➕ Menampilkan form tambah mahasiswa baru
     */
    public function create()
    {
        $matakuliah = MataKuliah::all();
        return view("mahasiswa.create", compact("matakuliah"));
    }

    /**
     * 💾 Menyimpan data mahasiswa baru ke database
     */
    public function store(Request $request)
    {
        // ✅ Validasi semua input termasuk semester
        $validated = $request->validate([
            "nim" => "required|unique:mahasiswas,nim",
            "nama" => "required|string|max:255",
            "semester" => "nullable|integer|min:1|max:14", // ⬅️ tambahkan ini
            "jurusan" => "required|string|max:255",
            "email" => "required|email|unique:mahasiswas,email",
            "mata_kuliah" => "array",
            "mata_kuliah.*" => "exists:mata_kuliahs,id",
        ]);

        // ✅ Simpan ke database
        $mhs = Mahasiswa::create($validated);

        // ✅ Sinkronkan relasi mata kuliah (jika ada)
        if ($request->filled("mata_kuliah")) {
            $mhs->mataKuliah()->sync($request->mata_kuliah);
        }

        return redirect()
            ->route("mahasiswa.index")
            ->with("success", "Mahasiswa berhasil ditambahkan.");
    }

    /**
     * 🔍 Menampilkan detail mahasiswa + mata kuliah yang diambil
     */
    public function show(Mahasiswa $mahasiswa)
    {
        $mahasiswa->load("mataKuliah");
        $matakuliah = MataKuliah::all();
        return view("mahasiswa.show", compact("mahasiswa", "matakuliah"));
    }

    /**
     * ✏️ Menampilkan form edit data mahasiswa
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        $matakuliah = MataKuliah::all();
        $selected = $mahasiswa
            ->mataKuliah()
            ->pluck("mata_kuliahs.id")
            ->toArray();

        return view("mahasiswa.edit", compact("mahasiswa", "matakuliah", "selected"));
    }

    /**
     * 🔄 Menyimpan perubahan data mahasiswa
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        // ✅ Validasi input termasuk semester
        $validated = $request->validate([
            "nim" => "required|unique:mahasiswas,nim," . $mahasiswa->id,
            "nama" => "required|string|max:255",
            "semester" => "nullable|integer|min:1|max:14", // ⬅️ tambahkan ini juga
            "jurusan" => "required|string|max:255",
            "email" => "required|email|unique:mahasiswas,email," . $mahasiswa->id,
            "mata_kuliah" => "array",
            "mata_kuliah.*" => "exists:mata_kuliahs,id",
        ]);

        $mahasiswa->update($validated);

        // ✅ Sinkronkan relasi many-to-many
        $mahasiswa->mataKuliah()->sync($request->mata_kuliah ?? []);

        return redirect()
            ->route("mahasiswa.index")
            ->with("success", "Data mahasiswa berhasil diperbarui.");
    }

    /**
     * ❌ Menghapus data mahasiswa
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();

        return redirect()
            ->route("mahasiswa.index")
            ->with("success", "Mahasiswa berhasil dihapus.");
    }
}
