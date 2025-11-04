@extends('layouts.app')

@section('title','Detail Mahasiswa')

@section('content')
<h1>Detail: {{ $mahasiswa->nama }}</h1>
<p><strong>NIM:</strong> {{ $mahasiswa->nim }}</p>
<p><strong>Semester:</strong> {{ $mahasiswa->semester }}</p>
<p><strong>Jurusan:</strong> {{ $mahasiswa->jurusan }}</p>
<p><strong>Email:</strong> {{ $mahasiswa->email }}</p>

<h3>Mata Kuliah Terdaftar</h3>
<ul>
    @forelse($mahasiswa->mataKuliah as $mk)
        <li>{{ $mk->kode }} - {{ $mk->nama_mk }} ({{ $mk->sks }} SKS)</li>
    @empty
        <li>Belum ada mata kuliah</li>
    @endforelse
</ul>

<a href="{{ route('mahasiswa.edit', $mahasiswa->id) }}">Edit</a>
@endsection
