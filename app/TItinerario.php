<?php

namespace GotoPeru;

use Illuminate\Database\Eloquent\Model;

class TItinerario extends Model
{
    protected $table = "titinerario";

    public function paquete()
    {
        return $this->belongsTo(TPaquete::class, 'idpaquetes');
    }
}
