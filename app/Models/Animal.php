<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $fillable = ['especie_id', 'recinto_id', 'actividad_id'];

    public function especie()
    {
        return $this->belongsTo(Especie::class);
    }

    public function recinto()
    {
        return $this->belongsTo(Recinto::class);
    }

    public function actividad()
    {
        return $this->belongsTo(Actividad::class);
    }
}
