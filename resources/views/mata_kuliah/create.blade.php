@extends('layouts.app')

@section('title','Tambah Mata Kuliah')

@section('content')
<h1>Tambah Mata Kuliah</h1>

@if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('mata_kuliah.store') }}" method="POST">
    @csrf
    <div>
        <label>Kode</label>
        <input type="text" name="kode" value="{{ old('kode') }}">
    </div>
    <div>
        <label>Nama MK</label>
        <input type="text" name="nama_mk" value="{{ old('nama_mk') }}">
    </div>
    <div>
        <label>SKS</label>
        <input type="number" name="sks" value="{{ old('sks', 2) }}">
    </div>
    <div>
        <label>Semester</label>
        <input type="number" name="semester" value="{{ old('semester', 1) }}">
    <div class="mb-3">
    <label for="dosen_pengampu" class="form-label">Dosen Pengampu</label>
    <input type="text" name="dosen_pengampu" id="dosen_pengampu" class="form-control" 
           value="{{ old('dosen_pengampu', $matakuliah->dosen_pengampu ?? '') }}" required>
</div>

    
    

    <button type="submit">Simpan</button>
</form>
@endsection
