<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User as ModelsUser;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class UsuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $usuarios=DB::table('users')->where('name','LIKE','%'.$query.'%')
            ->orderBy('id','desc')
            ->paginate(7);
            return view('seguridad.usuario.index',["usuarios"=>$usuarios,"searchText"=>$query]);
        }
    }

    public function create()
    {
        return view("seguridad.usuario.create");
    }
    public function store (Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
        $usuario=new ModelsUser();
        $usuario->name=$request->get('name');
        $usuario->email=$request->get('email');
        $usuario->password=bcrypt($request->get('password'));
        $usuario->save();
        return Redirect::to('seguridad/usuario');
    }
    public function edit($id)
    {
        return view("seguridad.usuario.edit",["usuario"=>ModelsUser::findOrFail($id)]);
    }    
    public function update(Request $request,$id)
    {
        $usuario=ModelsUser::findOrFail($id);
        $usuario->name=$request->get('name');
        $usuario->email=$request->get('email');
        $usuario->password=bcrypt($request->get('password'));
        $usuario->update();
        return Redirect::to('seguridad/usuario');
    }
    public function destroy($id)
    {
        $usuario = DB::table('users')->where('id', '=', $id)->delete();
        return Redirect::to('seguridad/usuario');
    }
}
