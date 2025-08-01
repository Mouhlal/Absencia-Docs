<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Matieres;
use Illuminate\Http\Request;

class MatieresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matieres = Matieres::all();
        return response()->json($matieres);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'nv_scolaires' => 'required',
            'description' => 'nullable|string',
        ]);

        $matiere = Matieres::create($request->all());
        return response()->json($matiere, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $matiere = Matieres::findOrFail($id);
        return response()->json($matiere);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'nullable|string',
            'nv_scolaires' => 'nullable',
            'description' => 'nullable|string',
        ]);

        $matiere = Matieres::findOrFail($id);
        $matiere->update($request->all());
        return response()->json($matiere);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $matiere = Matieres::findOrFail($id);
        $matiere->delete();
        return response()->json(null, 204);
    }
}

