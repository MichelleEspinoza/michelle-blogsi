<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use Illuminate\Http\Request;
use App\Models\Categoria as ModelsArticulo;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Input; //para subir imagen al server
use Illuminate\Support\Facades\DB;

class ArticuloController extends Controller
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
          $query=trim($request->get('searchText'));
           $articulos=DB::table('articulo as a')
           ->join('categoria as c','a.idcategoria','=','c.id')
           ->select('a.id','a.nombre','a.codigo','a.stock','c.nombre as categoria','a.descripcion','a.imagen','a.estado')
           ->where('a.nombre','like','%'.$query.'%')
           ->orwhere('a.codigo','like','%'.$query.'%')
           ->where('condicion','=', 1)
           ->orderBy('a.id')
           ->paginate(5);
            return view('almacen.articulo.index',['articulos'=>$articulos,'searchText'=>$query]);
            
        }
    }
    public function create()
    {
        $categorias=DB::table('categoria')->where('condicion','=','1')->get();
        return view("almacen.articulo.create",["categorias"=>$categorias]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'idcategoria'=>'required',
            'codigo'=>'required|max:50',
            'nombre'=>'required|max:100',
            'stock'=>'required|numeric',
            'descripcion'=>'max:512',
            'imagen'=>'mimes:jpeg,jpg,bmp,png'
        ]);
        $articulo=new Articulo();
        $articulo->idcategoria=$request->get('idcategoria');
        $articulo->codigo=$request->get('codigo');
        $articulo->nombre=$request->get('nombre');
        $articulo->stock=$request->get('stock');
        $articulo->descripcion=$request->get('descripcion');
        $articulo->estado='Activo';
        if ($request->hasFile('imagen')){
            $file= $request-> file("imagen");
            //$nombrearchivo  = str_slug($request->slug).".".$file->getClientOriginalExtension();
            $nombrearchivo  = $file->getClientOriginalName();
            $file->move(public_path("img/articulos/"),$nombrearchivo);
            $articulo->imagen= $nombrearchivo;
        }
        $articulo->save();
        return Redirect::to('almacen/articulo');
    }
    public function show($id)
    {
        return view("almacen.articulo.show",["articulo"=>ModelsArticulo::findOrFail($id)]);
    }
    public function edit($id)
    {
        $articulo=Articulo::findOrFail($id);
        $categorias=DB::table('categoria')->where('condicion','=','1')->get();
        return view("almacen.articulo.edit",["articulo"=>$articulo,"categorias"=>$categorias]);
    }
    public function update(Request $request, $id)
    {
        $articulo=Articulo::findOrFail($id);
        $articulo->idcategoria=$request->get('idcategoria');
        $articulo->codigo=$request->get('codigo');
        $articulo->nombre=$request->get('nombre');
        $articulo->stock=$request->get('stock');
        $articulo->descripcion=$request->get('descripcion');
        //$imageName = time().'.'.$request->image->extension(); 
        if ($request->hasFile('imagen')){
            $file= $request-> file("imagen");
            $nombrearchivo  = $file->getClientOriginalName();
            $path = public_path().'/img/articulos/';
          //  $file_old = $path.$articulo->file;
            //unlink($file_old);
            $file->move(public_path("img/articulos/"),$nombrearchivo);
            $articulo->imagen= $nombrearchivo;
        }
        
      //  $articulo->imagen->move(public_path('imagen'), $imageName);
        $articulo->update();
        return Redirect::to('almacen/articulo');
        
    }
    public function destroy($id)
    {
        $articulo=ModelsArticulo::findOrFail($id);
        $articulo->estado='Inactivo';
        $articulo->update();
        return Redirect::to('almacen/articulo');
    }
}
