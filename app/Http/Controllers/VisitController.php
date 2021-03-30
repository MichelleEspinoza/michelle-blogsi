<?php

namespace App\Http\Controllers;
use Khill\Lavacharts\Lavacharts;
use App\Models\Articulo;
use App\Models\Venta;
use Illuminate\Http\Request;

class VisitController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
   
        //GRAFICA ARTICULOS
        $lava = new Lavacharts; 
 
        $popularity = $lava->DataTable();
        $data = Articulo::select("nombre as 0","stock as 1")->get()->toArray();
 
        $popularity->addStringColumn('Nombre')
            ->addNumberColumn('Cantidad')
            ->addRows($data);
 
        $lava->DonutChart('Popularity', $popularity,[
        'title' =>'Articulos',
        ]);
        //GRAFICA VENTA
        $lava2 = new Lavacharts; 
        $popularity2 = $lava2->DataTable();
        $data2 = Venta::select("tipo_comprobante as 0","total_venta as 1")->get()->toArray();
 
        $popularity2->addStringColumn('Tipo comprobante')
            ->addNumberColumn('Total de venta')
            ->addRows($data2);
 
        $lava2->ComboChart('Popularity2', $popularity2,[
        'title' =>'Tipo de venta',
        'titleTextStyle' => [
            'color'    => 'rgb(0, 0, 0)',
            'fontSize' => 16
        ],
        'legend' => [
            'position' => 'in'
        ],
        'seriesType' => 'bars',
        'series' => [
            2 => ['type' => 'line']
        ]
        ]);
 
    //return view('larachart',compact('lava'));
    //return view('larachart',compact('lava','lava2'));
    return view('larachart', ['lava'=> $lava,'lava2'=> $lava2 ]);
    }
}
