<?php

namespace GotoPeru;

use Illuminate\Database\Eloquent\Model;

class TPaqueteDestino extends Model
{
    protected $table = "tpaquetesdestinos";

    public function paquetes_cotizaciones()
    {
        return $this->belongsTo(PaqueteCotizacion::class, 'idpaquetes');
    }

    public function destinos()
    {
        return $this->belongsTo(TDestino::class, 'iddestinos');
    }
}
