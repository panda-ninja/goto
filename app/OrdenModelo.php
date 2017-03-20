<?php

namespace GotoPeru;

use Illuminate\Database\Eloquent\Model;

class OrdenModelo extends Model
{
    //
    protected $table = "orden_modelo";
    protected $fillable = [
        'nombre','min','max','precio'
    ];

    protected $hidden = [
        '',
    ];
    public function ordenes()
    {
        return $this->hasMany(ItinerarioOrdenModelo::class, 'orden_modelo_id');
    }
}
