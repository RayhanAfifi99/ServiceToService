@extends('layouts.app')

@section('title', 'Daftar Mata Kuliah')

@section('content')
<div class="container">
    <h2 class="mb-4">Daftar Mata Kuliah</h2>

    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Kode</th>
                <th>Nama</th>
                <th>SKS</th>
                <th>Prodi</th>
                <th>Hari</th>
            </tr>
        </thead>
        <tbody>
            @forelse($matkuls as $matkul)
                <tr>
                    <td>{{ $matkul->kode }}</td>
                    <td>{{ $matkul->nama }}</td>
                    <td>{{ $matkul->sks }}</td>
                    <td>{{ $matkul->prodi }}</td>
                    <td>{{ $matkul->day }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Belum ada data mata kuliah.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
