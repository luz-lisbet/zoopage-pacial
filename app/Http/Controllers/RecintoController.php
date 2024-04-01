<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Recinto;
use Illuminate\Http\Request;

class RecintoController extends Controller
{
    public function index()
    {
        $recintos = Recinto::all();
        return response()->json(['recintos' => $recintos], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'capacidad' => 'required|integer',
        ]);

        $recinto = Recinto::create([
            'capacidad' => $request->capacidad,
        ]);

        return response()->json(['recinto' => $recinto, 'message' => 'Recinto creado correctamente'], 201);
    }

    public function show(Recinto $recinto)
    {
        return response()->json(['recinto' => $recinto], 200);
    }

    public function update(Request $request, Recinto $recinto)
    {
        $request->validate([
            'capacidad' => 'required|integer',
        ]);

        $recinto->update([
            'capacidad' => $request->capacidad,
        ]);

        return response()->json(['recinto' => $recinto, 'message' => 'Recinto actualizado correctamente'], 200);
    }

    public function destroy(Recinto $recinto)
    {
        $recinto->delete();

        return response()->json(['message' => 'Recinto eliminado correctamente'], 200);
    }
}
