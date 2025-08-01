<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Groupes;
use Illuminate\Http\Request;

class GroupesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $groupes = Groupes::all();
        return response()->json($groupes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nv_scolaires' => 'required|integer',
        ]);

        $groupe = Groupes::create($request->all());
        return response()->json($groupe, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $groupe = Groupes::findOrFail($id);
        return response()->json($groupe);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
            'nv_scolaires' => 'nullable|integer',
        ]);

        $groupe = Groupes::findOrFail($id);
        $groupe->update($request->all());
        return response()->json($groupe);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $groupe = Groupes::findOrFail($id);
        $groupe->delete();
        return response()->json(null, 204);
    }
}
