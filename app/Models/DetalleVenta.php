<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    use HasFactory;
    protected $table = 'detalle_ventaa';
    //protected $primaryKey = 'id';
    //public $timestamps=false;

    protected $fillable =[
        'idventa',
        'idarticulo',
        'cantidad',
        'precio_venta',
        'descuento'
    ];
    protected $guarded = [

    ];
}
