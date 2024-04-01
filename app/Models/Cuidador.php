<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cuidador extends Model
{
    protected $fillable = ['nombre', 'especialidad'];

    public function animals()
    {
        return $this->belongsToMany(Animal::class, 'cuidador_animal', 'cuidador_id', 'animal_id');
    }
}
