<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductoModel extends Model
{
    protected $table = 'producto';//Tabla a la cual va a referenciar
    protected $primaryKey =  'productoID';//Llave primaria de la tabla
    public $timestamps = true;//Para activar los temporizadores de registros

    public function belongsCategory(){
        return $this->belongsTo(CategoriaModel::class, 'categoria', 'categoriaID');
    }

    public function belongsCustomer(){
        return $this->belongsTo(ClienteModel::class, 'cliente', 'cedulaCliente');
    }
}
