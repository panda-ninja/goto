<?php

namespace GotoPeru;

use Illuminate\Database\Eloquent\Model;

class PrecioPaquete extends Model
{
    public function paquetes_cotizaciones()
    {
        return $this->belongsTo(PaqueteCotizacion::class, 'paquete_cotizaciones_id');
    }
}
