<?php

namespace GotoPeru;

use Illuminate\Database\Eloquent\Model;

class TCategoria extends Model
{
    protected $table = "tcategoria";

    public function paquetes_categoria()
    {
        return $this->hasMany(TPaqueteCategoria::class, 'idcategoria');
    }
}
