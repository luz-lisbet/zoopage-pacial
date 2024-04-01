<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Cuidador;
use Illuminate\Http\Request;

class CuidadorController extends Controller
{
    public function index()
    {
        $cuidadores = Cuidador::all();
        return response()->json(['cuidadores' => $cuidadores], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'especialidad' => 'required|string',
        ]);

        $cuidador = Cuidador::create([
            'nombre' => $request->nombre,
            'especialidad' => $request->especialidad,
        ]);

        return response()->json(['cuidador' => $cuidador, 'message' => 'Cuidador creado correctamente'], 201);
    }

    public function show(Cuidador $cuidador)
    {
        return response()->json(['cuidador' => $cuidador], 200);
    }

    public function update(Request $request, Cuidador $cuidador)
    {
        $request->validate([
            'nombre' => 'required|string',
            'especialidad' => 'required|string',
        ]);

        $cuidador->update([
            'nombre' => $request->nombre,
            'especialidad' => $request->especialidad,
        ]);

        return response()->json(['cuidador' => $cuidador, 'message' => 'Cuidador actualizado correctamente'], 200);
    }

    public function destroy(Cuidador $cuidador)
    {
        $cuidador->delete();

        return response()->json(['message' => 'Cuidador eliminado correctamente'], 200);
    }
}
