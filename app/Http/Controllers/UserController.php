<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Caffeinated\Shinobi\Models\Role;
use App\Http\Requests\FotografiaRequest;
use App\Http\Requests\PasswordRequest;
use App\User;
use Carbon\Carbon;
use Toastr;

class UserController extends Controller
{
    public function __construct(){
        Carbon::setLocale('es');
    }

    public function perfilUsuario(){
        $usuario = User::get();
        return view('admin.usuario.perfilUsuario', compact('usuario'));
    }

    public function cambiarImagenUsuario(FotografiaRequest $request){
        try{
            $change = User::find(Auth::user()->id);
            $change->fill($request->all());
            $change->update();
            Toastr::success('Se actualizo de manera satisfactoria la imagen','Actualización');
        }catch(\Exception $ex){
            Toastr::error('Ocurrio un error: '.$ex->getMessage(),'Error');
        }
        return \Redirect::to('/perfil');
    }

    public function cambiarPasswordUsuario(PasswordRequest $request){
        try{
            $usuario = User::find(Auth::user()->id);
            $usuario->fill($request->all());
            $usuario->update();
            Toastr::success('Se actualizo de manera satisfactoria la contraseña, por lo que se recomienda salir y volver a ingresar al sistema', 'Actualización');
        }catch(\Exception $ex){
            Toastr::error('Ocurrió un error: '.$ex->getMessage(),'Error');
        }
        return \Redirect::to('/perfil');
    }

    public function listarUsuario(){
        $usuario = User::all();
        return view('admin.usuario.index', compact('usuario'));
    }
    
    public function nuevoUsuario(){
        $role = Role::get();
        return view('admin.usuario.create', compact('role'));
    }
    
    public function guardarUsuario(Request $request){
        try{
            $usuario = new User($request->all());
            $usuario->save();
            $usuario->roles()->sync($request->get('roles'));
            Toastr::success('Los datos del usuario: '.$usuario->us_nombre.' , se registraron de manera correcta', 'Registro');
        }catch(\Exception $ex){
            Toastr::error('Se produjo un error : '.$ex->getMessage(), 'Error');
        }
        return redirect()->route('users.listar');
    }
    
    public function editarUsuario($id){
        $usuario = User::find($id);
        $role = Role::all();
        return view('admin.usuario.edit', compact('usuario', 'role'));
    }
    
    public function actualizarUsuario(Request $request, $id){
        try{
            $usuario = User::find($id);
            $usuario->fill($request->all());
            $usuario->update();
            $usuario->roles()->sync($request->get('roles'));
            Toastr::success('Los datos del usuario: '.$usuario->us_nombre.' , se actualizaron de manera correcta', 'Actualización');
        }catch(\Exception $ex){
            Toastr::error('Se produjo un error : '.$ex->getMessage(), 'Error');
        }
        return redirect()->route('users.listar');
    }

    public function mostrarUsuario($id){
        $usuario = User::find($id);
        return view('admin.usuario.show', compact('usuario'));
    }
}
