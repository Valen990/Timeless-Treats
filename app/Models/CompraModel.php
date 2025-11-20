<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompraModel extends Model
{
    protected $table = 'cliente_compra_producto';//Tabla a la cual va a referenciar
    protected $primaryKey =  'compraID';//Llave primaria de la tabla
    public $timestamps = true; //Se tuvo que poner false puesto que salía un error

    //Campos que Laravel puede llenar automáticamente para evitar el error:
    //MassAssignmentException
    protected $fillable = [
        'cantidadCompra',
        'fechaCompra',
        'estadoCompra',
        'metodoPago',
        'totalCompra',
        'nombreCliente'
    ];

    public function hasProduct(){
        return $this->hasMany(ProductoModel::class);
    }

    public function hasCustomer(){
        return $this->hasMany(ClienteModel::class);
    }
}
