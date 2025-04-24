<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJadwalRequest;
use App\Http\Requests\UpdateJadwalRequest;
use App\Models\Jadwal;
use Illuminate\Support\Facades\Http;


class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJadwalRequest $request)
    {
        //
    }


    public function show(string $nim, string $day)
    {
        // 1. Get student
        $studentRes = Http::timeout(15)
            ->get(env('STUDENT_SERVICE_URL') . "/{$nim}")
            ->throw();   // 🔒 fail-fast on 4xx/5xx

        $student = $studentRes->json();

        // 2. Validate day
        $validDays = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        if (! in_array($day, $validDays)) {
            return response()->json(['error' => 'Invalid day'], 422);
        }

        // 3. Get matkul
        $matkulRes = Http::timeout(5)
            ->get(env('MATKUL_SERVICE_URL'), [
                'prodi' => $student['data']['prodi'],
                'day'   => $day
            ])->throw();

        $matkuls = $matkulRes->json();

        // 4. Compose and return
        return response()->json([
            'student' => $student,
            'jadwal'  => $matkuls,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jadwal $jadwal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJadwalRequest $request, Jadwal $jadwal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jadwal $jadwal)
    {
        //
    }

    public function showJadwalUI(string $nim, string $day)
    {
        // 1. Mendapatkan data mahasiswa berdasarkan NIM
        $studentRes = Http::timeout(15)
            ->get(env('STUDENT_SERVICE_URL') . "/{$nim}")
            ->throw();   // Fail-fast untuk 4xx/5xx

        $student = $studentRes->json();

        // 2. Validasi hari yang diminta
        $validDays = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        if (! in_array($day, $validDays)) {
            return view('jadwal_student', [
                'error' => 'Invalid day provided',
            ]);
        }

        // 3. Mengambil jadwal mata kuliah berdasarkan prodi dan hari
        $matkulRes = Http::timeout(5)
            ->get(env('MATKUL_SERVICE_URL'), [
                'prodi' => $student['data']['prodi'],
                'day'   => $day
            ])->throw();

        $matkuls = $matkulRes->json();

        // 4. Menampilkan data ke view
        return view('jadwal_student', [
            'student' => $student,
            'jadwal'  => $matkuls,
            'day'     => $day,
        ]);
    }
}
