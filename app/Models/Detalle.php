<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle extends Model
{
    use HasFactory;
    protected $table = 'detalle_ingreso';
    //protected $primaryKey = 'id';
    //public $timestamps=false;

    protected $fillable =[
        'idingreso',
        'idarticulo',
        'cantidad',
        'precio_compra',
        'precio_venta'
    ];
    protected $guarded = [

    ];
}
