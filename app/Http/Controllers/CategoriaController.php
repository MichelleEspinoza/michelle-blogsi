<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoriaFormRequest as RequestsCategoriaFormRequest;
use App\Models\Categoria as ModelsCategoria;
use Illuminate\Http\Request;
use App\Categoria;
use Illuminate\Support\Facades\Redirect;
use blogsi\Http\Request\CategoriaFormRequest;
use Illuminate\Support\Facades\DB;

class CategoriaController extends Controller
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
            
          /*  $query=trim($request->get('searchText'));
            $categorias=DB::table('categoria')->where('%','nombre','LIKE','%',$query.'%')
            ->where('condicion','=', 1)
            ->orderby('id','desc')
            ->paginate(7);*/
           
         /*  return view('almacen.categoria.index',['categoria'=>$categorias,'searchText'=>$query]);*/
         $query=trim($request->get('searchText'));
           $categorias=DB::table('categoria')
           ->where('nombre','like','%'.$query.'%')
           ->where('condicion','=', 1)
           ->orderBy('id')
           ->paginate(5);
            return view('almacen.categoria.index',['categorias'=>$categorias,'searchText'=>$query]);
            
        }
    }
    public function create()
    {
        return view("almacen.categoria.create");
    }
    public function store(Request $request)
    {
        $request->validate([
            'nombre'=>'required',
            'descripcion'=>'required',
        ]);
        $categoria=new ModelsCategoria;
        $categoria->nombre=$request->get('nombre');
        $categoria->descripcion=$request->get('descripcion');
        $categoria->condicion='1';
        $categoria->save();
        return Redirect::to('almacen/categoria');
    }
    public function show($id)
    {
        return view("almacen.categoria.show",["categoria"=>ModelsCategoria::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("almacen.categoria.edit",["categoria"=>ModelsCategoria::findOrFail($id)]);
    }
    public function update(Request $request, $id)
    {
        $categoria=ModelsCategoria::findOrFail($id);
        $categoria->nombre=$request->get('nombre');
        $categoria->descripcion=$request->get('descripcion');
        $categoria->update();
        return Redirect::to('almacen/categoria');
        
    }
    public function destroy($id)
    {
        $categoria=ModelsCategoria::findOrFail($id);
        $categoria->condicion='0';
        $categoria->update();
        return Redirect::to('almacen/categoria');
    }
}
