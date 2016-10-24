<?php

namespace GotoPeru;

use Illuminate\Database\Eloquent\Model;

class TPrecioPaquete extends Model
{
    protected $table = "tpreciopaquetes";

    public function paquetes_cotizaciones()
    {
        return $this->belongsTo(PaqueteCotizacion::class, 'idpaquetes');
    }
}
