<?php

namespace GotoPeru;

use Illuminate\Database\Eloquent\Model;

class ItinerarioOrden extends Model
{
    //
    protected $table = "itinerario_orden";
    public function orden_cotizaciones()
    {
        return $this->belongsTo(ItinerarioCotizacion::class, 'itinerario_cotizaciones_id');
    }
}
