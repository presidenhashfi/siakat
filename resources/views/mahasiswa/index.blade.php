@extends('layouts.app')

@section('title', 'Daftar Mahasiswa')

@section('content')
<div class="card">
    <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Daftar Mahasiswa</h5>
        <a href="{{ route('mahasiswa.create') }}" class="btn btn-light btn-sm">+ Tambah</a>
    </div>

    <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Semester</th>
                    <th>Jurusan</th>
                    <th>Mata Kuliah</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($mahasiswa as $index => $mhs)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $mhs->nim }}</td>
                        <td>{{ $mhs->nama }}</td>
                        <td>{{ $mhs->semester }}</td>
                        <td>{{ $mhs->jurusan }}</td>
                        <td>
                            @if ($mhs->mataKuliah->isNotEmpty())
                                <ul class="mb-0">
                                    @foreach ($mhs->mataKuliah as $mk)
                                        <li>{{ $mk->nama_mk }} ({{ $mk->sks }} sks)</li>
                                    @endforeach
                                </ul>
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="{{ route('mahasiswa.show', $mhs->id) }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="{{ route('mahasiswa.edit', $mhs->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('mahasiswa.destroy', $mhs->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted">Belum ada data mahasiswa</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="d-flex justify-content-center">
            {{ $mahasiswa->links() }}
        </div>
    </div>
</div>
@endsection
