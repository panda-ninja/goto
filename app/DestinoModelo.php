<?php

namespace GotoPeru;

use Illuminate\Database\Eloquent\Model;

class DestinoModelo extends Model
{
    //
    protected $table = "destino_modelo";

    protected $fillable = [
        'id','codigo','nombre', 'region', 'pais', 'descripcion', 'imagen', 'estado',
    ];

    protected $hidden = [ ];
}
