<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoriaModel extends Model
{
    protected $table = 'categoria';//Tabla a la cual va a referenciar
    protected $primaryKey =  'categoriaID';//Llave primaria de la tabla
    public $timestamps = true;//Para activar los temporizadores de registros

    public function hasProduct(){
        return $this->hasMany(ProductoModel::class);
    }
}
