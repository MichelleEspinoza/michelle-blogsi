<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta as ModelVenta;
use App\Models\DetalleVenta as ModelDetalleVenta;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Collection;
use Illuminate\Support\Facades\Redirect;
use Response;
class VentaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //recource trabaja aqui
    public function index(Request $request)
    {
        
      if($request)
        {
         $query=trim($request->get('searchText'));//trim elimina espacios
           $ventas=DB::table('ventaa as v')
           ->join('persona as p','v.idcliente','=','p.id')
           ->join('detalle_ventaa as dv','v.id','=','dv.idventa')
           ->select('v.id','v.updated_at','p.nombre','v.tipo_comprobante','v.serie_comprobante', 'v.num_comprobante', 'v.impuesto','v.estado','v.total_venta')
           ->where('v.num_comprobante','like','%'.$query.'%') 
           ->orderBy('id')
           ->groupBy('v.id','v.updated_at','p.nombre','v.tipo_comprobante','v.serie_comprobante', 'v.num_comprobante', 'v.impuesto','v.estado','v.total_venta')
           ->paginate(5);
           return view('ventas.venta.index',['ventas'=>$ventas,'searchText'=>$query]);
            
        }
    }
    public function create()
    {
        $personas=DB::table('persona')->where('tipo_persona','=','Cliente')->get();
        $articulos = DB::table('articulo as art')
        ->join('detalle_ingreso as di','art.id','=','di.idarticulo')
        ->select(DB::raw('CONCAT(art.codigo," ",art.nombre)AS articulo'),'art.id','art.stock',DB::raw('avg(di.precio_venta) as precio_promedio'))
        ->where('art.estado','=','Activo')
        ->where('art.stock','>','0')
        ->groupBy('articulo','art.id','art.stock')
        ->get();
        return view("ventas.venta.create",["personas"=>$personas,"articulos"=>$articulos]);
    }
    public function store(Request $request)
    {
       
        try{
            DB::beginTransaction();
            $venta=new ModelVenta();
            $venta->idcliente=$request->get('idcliente');
            $venta->tipo_comprobante=$request->get('tipo_comprobante');
            $venta->serie_comprobante=$request->get('serie_comprobante');
            $venta->num_comprobante=$request->get('num_comprobante');
            $venta->total_venta=$request->get('total_venta');
            //$mytime=Carbon::nom('America/tj');
            //$ingreso->fecha_hora=$mytime->toDateTimeString();
            $venta->updated_at=$request->get('updated_at');
            $venta->impuesto='18';
            $venta->estado='A';
            //dd($venta); 
            $venta->save();

            //$idingreso=$request->get('idingreso');
            $idarticulo=$request->get('idarticulo');
            $cantidad=$request->get('cantidad');
            $descuento=$request->get('descuento');
            $precio_venta=$request->get('precio_venta');
            
            $cont=0;
            while($cont < count($idarticulo)){
                $detalle = new ModelDetalleVenta();
                $detalle->idventa=$venta->id;
                $detalle->idarticulo=$idarticulo[$cont];
                $detalle->cantidad=$cantidad[$cont];
                $detalle->descuento=$descuento[$cont];
                $detalle->precio_venta=$precio_venta[$cont];
                $detalle->save();
                $cont=$cont+1;
            }
            DB::commit();
        }catch(\Exception $e){
            dd($e->getMessage()); 
            DB::rollBack();
        }
        return Redirect::to('ventas/venta');
    }
    public function show($id)
    {
        $venta=DB::table('ventaa as v')
        ->join('persona as p','v.idcliente','=','p.id')
        ->join('detalle_ventaa as dv','v.id','=','dv.idventa')
        ->select('v.id','v.updated_at','p.nombre','v.tipo_comprobante','v.serie_comprobante', 'v.num_comprobante', 'v.impuesto','v.estado','v.total_venta')
        ->where('v.id','=',$id)
        ->groupBy('v.id','v.updated_at','p.nombre','v.tipo_comprobante','v.serie_comprobante', 'v.num_comprobante', 'v.impuesto','v.estado','v.total_venta')
        ->first();

        $detalles=DB::table('detalle_ventaa as d')
        ->join('articulo as a','d.idarticulo','=','a.id')
        ->select('a.nombre as articulo','d.cantidad','d.descuento','d.precio_venta')
        ->where('d.idventa','=',$id)
        ->get();
        return view("ventas.venta.show",["venta"=>$venta,"detalles"=>$detalles]);
    }
   /* public function edit($id)
    {
        return view("compras.ingreso.edit",["ingreso"=>ModelsPersona::findOrFail($id)]);
    }*/
   /* public function update(Request $request, $id)
    {
        $persona=ModelsPersona::findOrFail($id);
        $persona->nombre=$request->get('nombre');
        $persona->tipo_documento=$request->get('tipo_documento');
        $persona->num_documento=$request->get('num_documento');
        $persona->direccion=$request->get('direccion');
        $persona->telefono=$request->get('telefono');
        $persona->email=$request->get('email');
        $persona->update();
        return Redirect::to('compras/proveedor');
        
    }*/
    public function destroy($id)
    {
        $venta=ModelVenta::findOrFail($id);
        $venta->Estado='C';
        $venta->update();
        return Redirect::to('ventas/venta');
    }
}
