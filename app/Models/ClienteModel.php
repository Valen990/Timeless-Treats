<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClienteModel extends Model
{
    protected $table = 'cliente';//Tabla a la cual va a referenciar
    protected $primaryKey =  'cedulaCliente';//Llave primaria de la tabla
    public $timestamps = true;//Para activar los temporizadores de registros

    public function hasProduct(){
        return $this->hasMany(ProductoModel::class);
    }
}
