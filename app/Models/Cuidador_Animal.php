<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CuidadorAnimal extends Model
{
    protected $table = 'cuidador_animal';
    protected $fillable = ['cuidador_id', 'animal_id'];

    public function cuidador()
    {
        return $this->belongsTo(Cuidador::class);
    }

    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }
}
