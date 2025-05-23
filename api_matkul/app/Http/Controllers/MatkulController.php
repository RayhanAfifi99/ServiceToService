<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMatkulRequest;
use App\Http\Requests\UpdateMatkulRequest;
use App\Models\Matkul;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\Rule;



class MatkulController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $validated = $request->validate([
            'prodi' => ['sometimes', 'string'],
            'day'   => ['sometimes', Rule::in([
                'Monday',
                'Tuesday',
                'Wednesday',
                'Thursday',
                'Friday',
                'Saturday',
                'Sunday'
            ])],
        ]);

        $query = Matkul::query();

        if ($request->filled('prodi')) {
            $query->where('prodi', $validated['prodi']);
        }
        if ($request->filled('day')) {
            $query->where('day',   $validated['day']);
        }


        $matkuls = $query->get();
        return response()->json($matkuls);
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
    public function store(StoreMatkulRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Matkul $matkul)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Matkul $matkul)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMatkulRequest $request, Matkul $matkul)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Matkul $matkul)
    {
        //
    }

    public function viewIndex()
    {
        $matkuls = Matkul::all();
        return view('matkuls.index', compact('matkuls'));
    }
}
