<?php

namespace GotoPeru;

use Illuminate\Database\Eloquent\Model;

class ItinerarioModelo extends Model
{
    //
    protected $table = "itinerario_modelo";
    protected $fillable = [
        'dia','titulo','descripcion','precio','imagen'
    ];

    protected $hidden = [
        '',
    ];
    public function itinerarios()
    {
        return $this->hasMany(ItinerarioOrdenModelo::class, 'itinerario_modelo_id');
    }
}
