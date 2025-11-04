@extends('layouts.app')

@section('title', 'Detail Mata Kuliah')

@section('content')
<div class="container mt-4">
    <h2>Detail Mata Kuliah</h2>
    <a href="{{ route('mata_kuliah.index') }}" class="btn btn-secondary mb-3">← Kembali</a>

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th width="200">Kode Mata Kuliah</th>
                    <td>{{ $mata_kuliah->kode }}</td>
                </tr>
                <tr>
                    <th>Nama Mata Kuliah</th>
                    <td>{{ $mata_kuliah->nama_mk }}</td>
                </tr>
                <tr>
                    <th>Jumlah SKS</th>
                    <td>{{ $mata_kuliah->sks }}</td>
                </tr>
                <tr>
                    <th>Semester</th>
                    <td>{{ $mata_kuliah->semester }}</td>
                </tr>
                <tr>
                    <th>Dosen Pengampu</th>
                    <td>{{ $mata_kuliah->dosen_pengampu }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection
