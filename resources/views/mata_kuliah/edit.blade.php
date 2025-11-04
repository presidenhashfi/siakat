@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-3 fw-bold text-primary">Edit Mata Kuliah</h2>
    <a href="{{ route('mata_kuliah.index') }}" class="btn btn-secondary mb-3">← Kembali</a>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('mata_kuliah.update', $mata_kuliah->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Alert Validasi --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Terjadi Kesalahan!</strong>
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Kode MK --}}
                <div class="mb-3">
                    <label for="kode" class="form-label fw-semibold">Kode MK</label>
                    <input 
                        type="text" 
                        name="kode" 
                        id="kode" 
                        class="form-control"
                        value="{{ old('kode', $mata_kuliah->kode) }}" 
                        required>
                </div>

                {{-- Nama MK --}}
                <div class="mb-3">
                    <label for="nama_mk" class="form-label fw-semibold">Nama Mata Kuliah</label>
                    <input 
                        type="text" 
                        name="nama_mk" 
                        id="nama_mk" 
                        class="form-control"
                        value="{{ old('nama_mk', $mata_kuliah->nama_mk) }}" 
                        required>
                </div>

                {{-- SKS --}}
                <div class="mb-3">
                    <label for="sks" class="form-label fw-semibold">SKS</label>
                    <input 
                        type="number" 
                        name="sks" 
                        id="sks" 
                        class="form-control"
                        value="{{ old('sks', $mata_kuliah->sks) }}" 
                        required>
                </div>

                {{-- Semester --}}
                <div class="mb-3">
                    <label for="semester" class="form-label fw-semibold">Semester</label>
                    <input 
                        type="text" 
                        name="semester" 
                        id="semester" 
                        class="form-control"
                        value="{{ old('semester', $mata_kuliah->semester) }}">
                </div>

                <div class="mb-3">
    <label for="dosen_pengampu" class="form-label">Dosen Pengampu</label>
    <input type="text" name="dosen_pengampu" id="dosen_pengampu" class="form-control" 
           value="{{ old('dosen_pengampu', $matakuliah->dosen_pengampu ?? '') }}" required>
</div>


                {{-- Tombol --}}
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">
                        💾 Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
