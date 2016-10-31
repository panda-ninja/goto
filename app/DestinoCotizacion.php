<?php

namespace GotoPeru;

use Illuminate\Database\Eloquent\Model;

class DestinoCotizacion extends Model
{
    protected $table = "destino_cotizaciones";

    public function paquetes_destinos()
    {
        return $this->hasMany(DestinoPaqueteCotizacion::class, 'paquete_cotizaciones_id');
    }
}
