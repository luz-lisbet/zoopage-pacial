<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function index()
    {
        $animales = Animal::all();
        return response()->json(['animales' => $animales], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'especie_id' => 'required|exists:especies,id',
            'recinto_id' => 'required|exists:recintos,id',
            'actividad_id' => 'required|exists:actividades,id',
        ]);

        $animal = Animal::create([
            'especie_id' => $request->especie_id,
            'recinto_id' => $request->recinto_id,
            'actividad_id' => $request->actividad_id,
        ]);

        return response()->json(['animal' => $animal, 'message' => 'Animal creado correctamente'], 201);
    }

    public function show(Animal $animal)
    {
        return response()->json(['animal' => $animal], 200);
    }

    public function update(Request $request, Animal $animal)
    {
        $request->validate([
            'especie_id' => 'required|exists:especies,id',
            'recinto_id' => 'required|exists:recintos,id',
            'actividad_id' => 'required|exists:actividades,id',
        ]);

        $animal->update([
            'especie_id' => $request->especie_id,
            'recinto_id' => $request->recinto_id,
            'actividad_id' => $request->actividad_id,
        ]);

        return response()->json(['animal' => $animal, 'message' => 'Animal actualizado correctamente'], 200);
    }

    public function destroy(Animal $animal)
    {
        $animal->delete();

        return response()->json(['message' => 'Animal eliminado correctamente'], 200);
    }
}
