<?php

namespace GotoPeru;

use Illuminate\Database\Eloquent\Model;

class ItinerarioCotizacion extends Model
{
    protected $table = "itinerario_cotizaciones";

    public function paquetes_cotizaciones()
    {
        return $this->belongsTo(PaqueteCotizacion::class, 'cotizaciones_id');
    }

    public function horas_cotizaciones()
    {
        return $this->hasMany(HoraCotizacion::class, 'itinerario_cotizaciones_id');
    }

    public function servicios_cotizaciones()
    {
        return $this->hasMany(ServicioCotizacion::class, 'itinerario_cotizaciones_id');
    }

}
