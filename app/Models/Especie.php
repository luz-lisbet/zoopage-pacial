<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Especie extends Model
{
    protected $fillable = ['nombre'];

    public function animals()
    {
        return $this->hasMany(Animal::class);
    }
}
