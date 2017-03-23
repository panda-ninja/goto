<?php

namespace GotoPeru;

use Illuminate\Database\Eloquent\Model;

class PItinerario extends Model
{
    //
    protected $table = "pitinerario";

    public function paquete()
    {
        return $this->belongsTo(PPaquete::class, 'ppaquete_id');
    }
    public function ordenes()
    {
        return $this->hasMany(PItinerarioOrden::class, 'pitinerario_id');
    }
}
