<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Especie;
use Illuminate\Http\Request;

class EspecieController extends Controller
{
    public function index()
    {
        $especies = Especie::all();
        return response()->json(['especies' => $especies], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
        ]);

        $especie = Especie::create([
            'nombre' => $request->nombre,
        ]);

        return response()->json(['especie' => $especie, 'message' => 'Especie creada correctamente'], 201);
    }

    public function show(Especie $especie)
    {
        return response()->json(['especie' => $especie], 200);
    }

    public function update(Request $request, Especie $especie)
    {
        $request->validate([
            'nombre' => 'required|string',
        ]);

        $especie->update([
            'nombre' => $request->nombre,
        ]);

        return response()->json(['especie' => $especie, 'message' => 'Especie actualizada correctamente'], 200);
    }

    public function destroy(Especie $especie)
    {
        $especie->delete();

        return response()->json(['message' => 'Especie eliminada correctamente'], 200);
    }
}
