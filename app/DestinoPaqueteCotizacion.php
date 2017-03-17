<?php

namespace GotoPeru;

use Illuminate\Database\Eloquent\Model;

class DestinoPaqueteCotizacion extends Model
{
    protected $table = "destino_paquete_cotizaciones";
    protected $fillable = [
        'destino_cotizaciones_id', 'paquete_cotizaciones_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];
    public function paquetes_cotizaciones()
    {
        return $this->belongsTo(PaqueteCotizacion::class, 'paquete_cotizaciones_id');
    }

    public function destinos()
    {
        return $this->belongsTo(DestinoCotizacion::class, 'destino_cotizaciones_id');
    }
}
