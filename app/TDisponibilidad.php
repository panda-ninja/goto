<?php

namespace GotoPeru;

use Illuminate\Database\Eloquent\Model;

class TDisponibilidad extends Model
{
    protected $table = "tdisponibilidad";

    public function disponibilidad()
    {
        return $this->belongsTo(TPaquete::class, 'idpaquetes');
    }
}
