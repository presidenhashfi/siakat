@extends('layouts.app')

@section('title', 'Tambah Mahasiswa')

@section('content')
<h1>Tambah Mahasiswa</h1>

@if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('mahasiswa.store') }}" method="POST">
    @csrf

    <div>
        <label>NIM</label><br>
        <input type="text" name="nim" value="{{ old('nim') }}">
    </div>

    <div>
        <label>Nama</label><br>
        <input type="text" name="nama" value="{{ old('nama') }}">
    </div>

    <div>
        <label>Semester</label><br>
        <input type="text" name="semester" value="{{ old('semester') }}">
    </div>

    <div>
        <label>Jurusan</label><br>
        <input type="text" name="jurusan" value="{{ old('jurusan') }}">
    </div>

    <div>
        <label>Email</label><br>
        <input type="email" name="email" value="{{ old('email') }}">
    </div>

    <div>
        <label>Mata Kuliah (pilih beberapa dengan Ctrl/Cmd)</label><br>
        <select name="mata_kuliah[]" multiple size="6">
            @foreach($matakuliah as $mk)
                <option value="{{ $mk->id }}">
                    {{ $mk->kode }} - {{ $mk->nama_mk }}
                </option>
            @endforeach
        </select>
    </div>

    <br>
    <button type="submit">Simpan</button>
</form>
@endsection
