<?php

namespace GotoPeru;

use Illuminate\Database\Eloquent\Model;

class DestinoPaqueteCotizacion extends Model
{
    protected $table = "detino_paquete_cotizaciones";

    public function paquetes_cotizaciones()
    {
        return $this->belongsTo(PaqueteCotizacion::class, 'paquete_cotizaciones_id');
    }

    public function destinos()
    {
        return $this->belongsTo(DestinoCotizacion::class, 'paquete_cotizaciones_id');
    }
}
