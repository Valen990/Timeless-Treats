<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompraModel extends Model
{
    protected $table = 'cliente_compra_producto';//Tabla a la cual va a referenciar
    protected $primaryKey =  'compraID';//Llave primaria de la tabla
    public $timestamps = true;//Para activar los temporizadores de registros

    public function hasProduct(){
        return $this->hasMany(ProductoModel::class);
    }

    public function hasCustomer(){
        return $this->hasMany(ClienteModel::class);
    }
}
