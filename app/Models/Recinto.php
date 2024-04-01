<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recinto extends Model
{
    protected $fillable = ['capacidad'];

    public function animals()
    {
        return $this->hasMany(Animal::class);
    }
}
