<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Previous;
use App\Elegible;
use Toastr;
use DB;

class ElegibleTecnicoController extends Controller
{
    public function __construct(){
        Carbon::setLocale('es');
    }

    public function index(){
        $elegible = Elegible::where('ele_estadotecnico','=','PENDIENTE')->get();
        return view('admin.elegible.tecnico.index', compact('elegible'));
    }

    public function edit($id){
        $elegible = Elegible::find($id);
        return view('admin.elegible.tecnico.edit', compact('elegible'));
    }

    public function update(Request $request, $id){
        try{
            $attributes = array(
                'ele_tecnica' => 'Archivo Técnico',
                'ele_tecnica_check' => 'Check',
                'ele_obstecnica' => 'Observaciones'
            );
            $elegible = Elegible::find($id);
            $elegible->fill($request->all());
            $elegible->ele_tecregistra = date('Y-m-d H:i:s');
            $elegible->ele_tecactualiza = date('Y-m-d H:i:s');
            $elegible->idtecnico_registra = Auth::user()->id;
            $elegible->idtecnico_actualiza = Auth::user()->id;

            if(isset($_POST['btnaceptar'])){
                $validator = Validator::make($request->all(),[
                    'ele_tecnica' => 'required|mimes:pdf',
                    'ele_tecnica_check' => 'required',
                    'ele_obstecnica' => 'required|min:10'
                ]);
                $validator->setAttributeNames($attributes);
                if($validator->fails()){
                    Toastr::error('Verificar campos validos para su correción','Error');
                    return redirect()->route('eletec.edit',$id)->withErrors($validator)->withInput();
                }
                $elegible->ele_estadotecnico = "ACEPTADO";
                $elegible->ele_estadolegal = "PENDIENTE";
                $elegible->ele_tecnica_check = ($request->input('ele_tecnica_check')=='on')? 1:0;
            }elseif(isset($_POST['btnpendiente'])){
                $validator = Validator::make($request->all(),[
                    'ele_tecnica' => 'mimes:pdf',
                    'ele_obstecnica' => 'required|min:20'
                ]);
                $validator->setAttributeNames($attributes);
                if($validator->fails()){
                    Toastr::error('Verificar campos validos para su correción','Error');
                    return redirect()->route('eletec.edit',$id)->withErrors($validator)->withInput();
                }
                $elegible->ele_estadotecnico = "PENDIENTE";
            }elseif(isset($_POST['btnrechazado'])){
                $validator = Validator::make($request->all(),[
                    'ele_tecnica' => 'mimes:pdf',
                    'ele_obstecnica' => 'required|min:20'
                ]);
                $validator->setAttributeNames($attributes);
                if($validator->fails()){
                    Toastr::error('Verificar campos validos para su correción','Error');
                    return redirect()->route('eletec.edit',$id)->withErrors($validator)->withInput();
                }
                $elegible->ele_estadotecnico = 'RECHAZADO';
            }
            $elegible->update();
            Toastr::success('Los datos del cumplimiento de elegibilidad se registraron de manera correcta','Actualización');
        }catch(\Exception $ex){
            Toastr::error('Ocurrio el siguiente error : '.$ex->getMessage(),'Error');
        }
        return redirect()->route('elefin.index');
    }

    public function show($id){

    }
}
