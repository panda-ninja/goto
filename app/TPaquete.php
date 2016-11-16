<?php

namespace GotoPeru;

use Illuminate\Database\Eloquent\Model;

class TPaquete extends Model
{
    protected $table = "tpaquetes";

    public function itinerario()
    {
        return $this->hasMany(TItinerario::class, 'idpaquetes');
    }

    public function precio_paquetes()
    {
        return $this->hasMany(TPrecioPaquete::class, 'idpaquetes');
    }

    public function paquetes_destinos()
    {
        return $this->hasMany(TPaqueteDestino::class, 'idpaquetes');
    }
}
