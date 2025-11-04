@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Daftar Mata Kuliah</h5>
        <a href="{{ route('mata_kuliah.create') }}" class="btn btn-light btn-sm">+ Tambah</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-hover align-middle">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode MK</th>
                    <th>Nama Mata Kuliah</th>
                    <th>SKS</th>
                    <th>Semester</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($mata_kuliah as $index => $mk)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $mk->kode }}</td>
                        <td>{{ $mk->nama_mk }}</td>
                        <td>{{ $mk->sks }}</td>
                        <td>{{ $mk->semester }}</td>
                        <td class="text-center">
                            <a href="{{ route('mata_kuliah.show', $mk->id) }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="{{ route('mata_kuliah.edit', $mk->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('mata_kuliah.destroy', $mk->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">Belum ada data mata kuliah</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="d-flex justify-content-center">
            {{ $mata_kuliah->links() }}
        </div>
    </div>
</div>
@endsection
