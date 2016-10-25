<?php

namespace GotoPeru;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'nombres',
        'apellidos','email'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function sub_clientes()
    {
        return $this->hasMany(SubCliente::class, 'clientes_id');
    }

    public function cotizaciones()
    {
        return $this->hasMany(Cotizacion::class, 'clientes_id');
    }
}
