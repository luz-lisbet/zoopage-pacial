<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Actividad;
use Illuminate\Http\Request;

class ActividadController extends Controller
{
    public function index()
    {
        $actividades = Actividad::all();
        return response()->json(['actividades' => $actividades], 200);
    }

    public function create()
    {
        // No se necesita implementar para la API
    }

    public function store(Request $request)
    {
        $request->validate([
            'dia' => 'required|string',
            'horario' => 'required|string',
        ]);

        $actividad = Actividad::create([
            'dia' => $request->dia,
            'horario' => $request->horario,
        ]);

        return response()->json(['actividad' => $actividad, 'message' => 'Actividad creada correctamente'], 201);
    }

    public function show(Actividad $actividad)
    {
        return response()->json(['actividad' => $actividad], 200);
    }

    public function edit(Actividad $actividad)
    {
        // No se necesita implementar para la API
    }

    public function update(Request $request, Actividad $actividad)
    {
        $request->validate([
            'dia' => 'required|string',
            'horario' => 'required|string',
        ]);

        $actividad->update([
            'dia' => $request->dia,
            'horario' => $request->horario,
        ]);

        return response()->json(['actividad' => $actividad, 'message' => 'Actividad actualizada correctamente'], 200);
    }

    public function destroy(Actividad $actividad)
    {
        $actividad->delete();

        return response()->json(['message' => 'Actividad eliminada correctamente'], 200);
    }
}
