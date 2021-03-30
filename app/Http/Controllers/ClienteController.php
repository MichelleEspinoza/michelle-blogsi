<?php

namespace App\Http\Controllers;

use App\Models\Persona as ModelsPersona;
use App\Models\Persona;
use Facade\Ignition\QueryRecorder\Query;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class ClienteController extends Controller
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
           ->where('tipo_persona','=', 'Cliente')
           ->orwhere('num_documento','like','%'.$query.'%')
           ->where('tipo_persona','=', 'Cliente')
           ->orderBy('id')
           ->paginate(5);
            return view('ventas.cliente.index',['personas'=>$personas,'searchText'=>$query]);
            
        }
    }
    public function create()
    {
        return view("ventas.cliente.create");
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
        $persona->tipo_persona='Cliente';
        $persona->num_documento=$request->get('num_documento');
        $persona->direccion=$request->get('direccion');
        $persona->telefono=$request->get('telefono');
        $persona->email=$request->get('email');
        $persona->save();
        return Redirect::to('ventas/cliente');
    }
    public function show($id)
    {
        return view("ventas.cliente.show",["persona"=>ModelsPersona::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("ventas.cliente.edit",["persona"=>ModelsPersona::findOrFail($id)]);
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
        return Redirect::to('ventas/cliente');
        
    }
    public function destroy($id)
    {
        $persona=ModelsPersona::findOrFail($id);
        $persona->tipo_persona='Inactivo';
        $persona->update();
        return Redirect::to('ventas/cliente');
    }
}
