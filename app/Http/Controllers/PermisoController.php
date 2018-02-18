<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Caffeinated\Shinobi\Models\Permission;
use Carbon\Carbon;
use Toastr;

class PermisoController extends Controller
{
    public function __construct(){
		Carbon::setLocale('es');
	}

    public function index(){
    	$permiso = Permission::orderBy('id','DESC')->get();
    	return view('admin.permisos.index', compact('permiso'));
    }

    public function create(){
    	return view('admin.permisos.create');
    }

    public function store(Request $request){
		try{
			$permiso = Permission::create($request->all());
			Toastr::success('Los datos del Permiso: '.$permiso->name.' , se registraron de manera correcta', 'Registro');
			return redirect()->route('permisos.index');
		}catch(\Exception $ex){
			Toastr::error('Se produjo un error : '.$ex->getMessage(), 'Error');
		}
    }

    public function show($id){
    	$permiso = Permission::find($id);
    	return view('admin.permisos.show', compact('permiso'));
    }

    public function edit($id){
    	$permiso = Permission::find($id);
    	return view('admin.permisos.edit', compact('permiso'));
    }

    public function update(Request $request, $id){
		try{
			$permiso = Permission::find($id);
			$permiso->update($request->all());
			Toastr::success('Los datos del Permiso: '.$permiso->name.' , se actualizaron de manera correcta', 'Actualización');
			return redirect()->route('permisos.index');
		}catch(\Exception $ex){
			Toastr::error('Se produjo un error : '.$ex->getMessage(), 'Error');
		}
    }
}
