<?php

namespace GotoPeru;

use Illuminate\Database\Eloquent\Model;

class PaqueteCotizacion extends Model
{
    protected $table = "paquete_cotizaciones";

    public function cotizaciones()
    {
        return $this->belongsTo(Cotizacion::class, 'cotizaciones_id');
    }

    public function itinerario_cotizaciones()
    {
        return $this->hasMany(ItinerarioCotizacion::class, 'paquete_cotizaciones_id');
    }

    public function precio_paquetes()
    {
        return $this->hasMany(PrecioPaquete::class, 'paquete_cotizaciones_id');
    }

    public function paquetes_destinos()
    {
        return $this->hasMany(DestinoPaqueteCotizacion::class, 'paquete_cotizaciones_id');
    }

}
