@extends('layouts.app')

@section('title', 'Edit Mahasiswa')

@section('content')
<h1>Edit Mahasiswa</h1>

@if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label>NIM</label><br>
        <input type="text" name="nim" value="{{ old('nim', $mahasiswa->nim) }}">
    </div>

    <div>
        <label>Nama</label><br>
        <input type="text" name="nama" value="{{ old('nama', $mahasiswa->nama) }}">
    </div>

    <div>
        <label>Semester</label><br>
        <input type="text" name="kelas" value="{{ old('kelas', $mahasiswa->kelas) }}">
    </div>

    <div>
        <label>Jurusan</label><br>
        <input type="text" name="jurusan" value="{{ old('jurusan', $mahasiswa->jurusan) }}">
    </div>

    <div>
        <label>Email</label><br>
        <input type="email" name="email" value="{{ old('email', $mahasiswa->email) }}">
    </div>

    <div>
        <label>Mata Kuliah (Ctrl/Cmd untuk pilih banyak)</label><br>
        <select name="mata_kuliah[]" multiple size="6">
            @foreach($matakuliah as $mk)
                <option value="{{ $mk->id }}" 
                    {{ in_array($mk->id, old('mata_kuliah', $selected)) ? 'selected' : '' }}>
                    {{ $mk->kode }} - {{ $mk->nama_mk }}
                </option>
            @endforeach
        </select>
    </div>

    <br>
    <button type="submit">Update</button>
</form>
@endsection
