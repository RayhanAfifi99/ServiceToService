@extends('layouts.app')

@section('title', 'Daftar Mahasiswa')

@section('content')
<div class="container">
    <h2 class="mb-4">Daftar Mahasiswa</h2>

    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Prodi</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @forelse($students as $student)
                <tr>
                    <td>{{ $student->nim }}</td>
                    <td>{{ $student->nama }}</td>
                    <td>{{ $student->prodi }}</td>
                    <td>{{ $student->email }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Belum ada data mahasiswa.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
