<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Docs;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{
    // Lister tous les documents de l'utilisateur connecté
    public function index()
    {
        $documents = Docs::where('user_id', Auth::id())->get();
        return response()->json($documents);
    }

    // Upload d'un document
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:10240', // max 10MB
            'title' => 'required|string|max:255',
        ]);

        $path = $request->file('file')->store('documents');

        $document = Docs::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'file_path' => $path,
        ]);

        return response()->json($document, 201);
    }

    // Télécharger un document (par id)
    public function download($id)
    {
        $document = Docs::where('user_id', Auth::id())->findOrFail($id);
        return Storage::download($document->file_path, $document->title);
    }

    // Supprimer un document
    public function destroy($id)
    {
        $document = Docs::where('user_id', Auth::id())->findOrFail($id);

        // Supprimer le fichier physique
        Storage::delete($document->file_path);

        $document->delete();

        return response()->json(null, 204);
    }
}
