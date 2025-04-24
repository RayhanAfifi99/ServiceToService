@extends('layouts.app')

@section('title', 'Jadwal Mahasiswa')

@section('content')
    <div class="container">
        <h2>Jadwal Mahasiswa</h2>
        
        @if (isset($error))
            <div class="alert alert-danger">{{ $error }}</div>
        @else
            <h3>Nama Mahasiswa: {{ $student['data']['nama'] }}</h3>
            <h4>Program Studi: {{ $student['data']['prodi'] }}</h4>
            <h4>Hari: {{ ucfirst($day) }}</h4>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Nama Mata Kuliah</th>
                        <th>Jam Mulai</th>
                        <th>Jam Selesai</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jadwal as $matkul)
                        <tr>
                            <td>{{ $matkul['kode'] }}</td>
                            <td>{{ $matkul['nama'] }}</td>
                            <td>{{ $matkul['start_time'] }}</td>
                            <td>{{ $matkul['end_time'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
