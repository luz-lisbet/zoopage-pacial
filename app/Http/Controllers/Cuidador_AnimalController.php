<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CuidadorAnimal;
use Illuminate\Http\Request;

class CuidadorAnimalController extends Controller
{
    public function index()
    {
        $cuidadorAnimales = CuidadorAnimal::all();
        return response()->json(['cuidadorAnimales' => $cuidadorAnimales], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'cuidador_id' => 'required|exists:cuidadores,id',
            'animal_id' => 'required|exists:animals,id',
        ]);

        $cuidadorAnimal = CuidadorAnimal::create([
            'cuidador_id' => $request->cuidador_id,
            'animal_id' => $request->animal_id,
        ]);

        return response()->json(['cuidadorAnimal' => $cuidadorAnimal, 'message' => 'Vínculo entre cuidador y animal creado correctamente'], 201);
    }

    public function show(CuidadorAnimal $cuidadorAnimal)
    {
        return response()->json(['cuidadorAnimal' => $cuidadorAnimal], 200);
    }

    public function update(Request $request, CuidadorAnimal $cuidadorAnimal)
    {
        $request->validate([
            'cuidador_id' => 'required|exists:cuidadores,id',
            'animal_id' => 'required|exists:animals,id',
        ]);

        $cuidadorAnimal->update([
            'cuidador_id' => $request->cuidador_id,
            'animal_id' => $request->animal_id,
        ]);

        return response()->json(['cuidadorAnimal' => $cuidadorAnimal, 'message' => 'Vínculo entre cuidador y animal actualizado correctamente'], 200);
    }

    public function destroy(CuidadorAnimal $cuidadorAnimal)
    {
        $cuidadorAnimal->delete();

        return response()->json(['message' => 'Vínculo entre cuidador y animal eliminado correctamente'], 200);
    }
}
