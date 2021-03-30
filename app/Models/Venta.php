<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;
    protected $table = 'ventaa';
    //protected $primaryKey = 'id';
    //public $timestamps=false;

    protected $fillable =[
        'idcliente',
        'tipo_comprobante',
        'serie_comprobante',
        'num_comprobante',
        'impuesto',
        'fecha_hora',
        'total_venta',
        'estado',
    ];
    protected $guarded = [

    ];
}
