<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;
use Carbon\Carbon;
use Toastr;

class RoleController extends Controller
{
	public function __construct(){
		Carbon::setLocale('es');
	}

    public function index(){
    	$roles = Role::paginate();
    	return view('admin.roles.index', compact('roles'));
    }

    public function create(){
    	$permissions = Permission::get();
    	return view('admin.roles.create', compact('permissions'));
    }

    public function store(Request $request){
		try{
			$role = Role::create($request->all());
			$role->permissions()->sync($request->get('permissions'));
			Toastr::success('Los datos del Rol: '.$role->name.' , se registraron de manera correcta', 'Registro');
			return redirect()->route('roles.index');
		}catch(\Exception $ex){
			Toastr::error('Se produjo un error : '.$ex->getMessage(), 'Error');
		}
    }

    public function show($id){
    	$role = Role::find($id);
    	return view('admin.roles.show', compact('role'));
    }

    public function edit($id){
    	$role = Role::find($id);
    	$permissions = Permission::get();
    	return view('admin.roles.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, $id){
		try{
			$role = Role::find($id);
			$role->update($request->all());
			$role->permissions()->sync($request->get('permissions'));
			Toastr::success('Los datos del Rol: '.$role->name.' , se actualizaron de manera correcta', 'Actualización');
			return redirect()->route('roles.index');
		}catch(\Exception $ex){
			Toastr::error('Se produjo un error : '.$ex->getMessage(), 'Error');
		}
    }

    public function destroy($id){
		try{
			$role = Role::find($id)->delete();
			Toastr::success('Se eliminó el rol de manera correcta', 'Eliminación');
			return back();
		}catch(\Exception $ex){
			Toastr::error('Se produjo un error : '.$ex->getMessage(), 'Error');
		}
    }
}
