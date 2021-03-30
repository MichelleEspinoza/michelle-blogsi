<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona as ModelsPersona;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ProveedorController extends Controller
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
           $personas=DB::table('persona')
           ->where('nombre','like','%'.$query.'%')
           ->where('tipo_persona','=', 'Proveedor')
           ->orwhere('num_documento','like','%'.$query.'%')
           ->where('tipo_persona','=', 'Proveedor')
           ->orderBy('id')
           ->paginate(5);
            return view('compras.proveedor.index',['personas'=>$personas,'searchText'=>$query]);
            
        }
    }
    public function create()
    {
        return view("compras.proveedor.create");
    }
    public function store(Request $request)
    {
        $request->validate([
            'nombre'=>'required|max:100',
            'tipo_documento'=>'required|max:20',
            'num_documento'=>'required|max:15',
            'direccion'=>'max:70',
            'telefono'=>'max:15',
            'email'=>'max:50',
        ]);
        $persona=new ModelsPersona;
        $persona->nombre=$request->get('nombre');
        $persona->tipo_documento=$request->get('tipo_documento');
        $persona->tipo_persona='Proveedor';
        $persona->num_documento=$request->get('num_documento');
        $persona->direccion=$request->get('direccion');
        $persona->telefono=$request->get('telefono');
        $persona->email=$request->get('email');
        $persona->save();
        return Redirect::to('compras/proveedor');
    }
    public function show($id)
    {
        return view("compras.proveedor.show",["persona"=>ModelsPersona::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("compras.proveedor.edit",["persona"=>ModelsPersona::findOrFail($id)]);
    }
    public function update(Request $request, $id)
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
        
    }
    public function destroy($id)
    {
        $persona=ModelsPersona::findOrFail($id);
        $persona->tipo_persona='Inactivo';
        $persona->update();
        return Redirect::to('compras/proveedor');
    }
}
