<?php

namespace GotoPeru;

use Illuminate\Database\Eloquent\Model;

class TPaquete_servicio_extra extends Model
{
    //
    protected $table = "paquete_servicio_extra";

    public function paquete_servicio_extra()
    {
        return $this->belongsTo(TPaquete::class,'idpaquete');
    }
    public function servicio_extra()
    {
        return $this->belongsTo(ServicioExtra::class,'idservicio_extras');
//        return $this->hasMany(ServicioExtra::class, 'idservicio_extras');
    }
}
