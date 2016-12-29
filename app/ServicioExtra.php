<?php

namespace GotoPeru;

use Illuminate\Database\Eloquent\Model;

class ServicioExtra extends Model
{
    protected $table = "tservicio_extras";
    public function servicio_extra()
    {
//        return $this->belongsTo(ServicioExtra::class,'idservicio_extras');
        return $this->hasMany(TPaquete_servicio_extra::class, 'idservicio_extra');
    }
}
