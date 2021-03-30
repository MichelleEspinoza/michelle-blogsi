<?php

namespace App\Http\Controllers;
use App\Models\Detalle;
use App\Models\Ingreso;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use Exception;

class IngresoController extends Controller
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
           $ingresos=DB::table('ingreso as i')
           ->join('persona as p','i.idproveedor','=','p.id')
           ->join('detalle_ingreso as di','i.id','=','di.idingreso')
           ->select('i.id','i.updated_at','p.nombre','i.tipo_comprobante','i.serie_comprobante', 'i.num_comprobante', 'i.impuesto','i.estado',DB::raw('sum(di.cantidad*precio_compra)as total'))
           ->where('i.num_comprobante','like','%'.$query.'%') 
           ->orderBy('id')
           ->groupBy('i.id','i.updated_at','p.nombre','i.tipo_comprobante','i.serie_comprobante', 'i.num_comprobante', 'i.impuesto','i.estado')
           ->paginate(5);
           return view('compras.ingreso.index',['ingresos'=>$ingresos,'searchText'=>$query]);
            
        }
    }
    public function create()
    {
        $personas=DB::table('persona')->where('tipo_persona','=','Proveedor')->get();
        $articulos = DB::table('articulo as art')
        ->select(DB::raw('CONCAT(art.codigo," ",art.nombre)AS articulo'),'art.id')
        ->where('art.estado','=','Activo')
        ->get();
        return view("compras.ingreso.create",["personas"=>$personas,"articulos"=>$articulos]);
    }
    public function store(Request $request)
    {
       
        try{
            DB::beginTransaction();
            $ingreso=new Ingreso;
            $ingreso->idproveedor=$request->get('idproveedor');
            $ingreso->tipo_comprobante=$request->get('tipo_comprobante');
            $ingreso->serie_comprobante=$request->get('serie_comprobante');
            $ingreso->num_comprobante=$request->get('num_comprobante');
            //$mytime=Carbon::nom('America/tj');
            //$ingreso->fecha_hora=$mytime->toDateTimeString();
            $ingreso->updated_at=$request->get('updated_at');
            $ingreso->impuesto='18';
            $ingreso->estado='A';
            $ingreso->save();

            //$idingreso=$request->get('idingreso');
            $idarticulo=$request->get('idarticulo');
            $cantidad=$request->get('cantidad');
            $precio_compra=$request->get('precio_compra');
            $precio_venta=$request->get('precio_venta');
            
            $cont=0;
            while($cont < count($idarticulo)){
                $detalle = new Detalle;
                $detalle->idingreso=$ingreso->id;
                $detalle->idarticulo=$idarticulo[$cont];
                $detalle->cantidad=$cantidad[$cont];
                $detalle->precio_compra=$precio_compra[$cont];
                $detalle->precio_venta=$precio_venta[$cont];
                $detalle->save();
                $cont=$cont+1;
            }
            DB::commit();
        }catch(\Exception $e){
            dd($e->getMessage()); 
            DB::rollBack();
        }
        return Redirect::to('compras/ingreso');
    }
    public function show($id)
    {
        $ingreso=DB::table('ingreso as i')
        ->join('persona as p','i.idproveedor','=','p.id')
        ->join('detalle_ingreso as di','i.id','=','di.idingreso')
        ->select('i.id','i.updated_at','p.nombre','i.tipo_comprobante','i.serie_comprobante', 'i.num_comprobante', 'i.impuesto','i.estado',DB::raw('sum(di.cantidad*precio_compra)as total'))
        ->where('i.id','=',$id)
        ->groupBy('i.id','i.updated_at','p.nombre','i.tipo_comprobante','i.serie_comprobante', 'i.num_comprobante', 'i.impuesto','i.estado')
        ->first();

        $detalles=DB::table('detalle_ingreso as d')
        ->join('articulo as a','d.idarticulo','=','a.id')
        ->select('a.nombre as articulo','d.cantidad','d.precio_compra','d.precio_venta')
        ->where('d.idingreso','=',$id)
        ->get();
        return view("compras.ingreso.show",["ingreso"=>$ingreso,"detalles"=>$detalles]);
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
        $ingreso=Ingreso::findOrFail($id);
        $ingreso->Estado='C';
        $ingreso->update();
        return Redirect::to('compras/ingreso');
    }
}
