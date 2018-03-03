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

class ElegibleFinancieroController extends Controller
{
    public function __construct(){
        Carbon::setLocale('es');
    }

    public function index(){  
        $documento = Previous::where('pre_estado','=','ACEPTADO')->get();
        return view('admin.elegible.financiero.index', compact('documento'));
    }

    public function create($id){
        return view('admin.elegible.financiero.create', compact('id'));
    }

    public function store(Request $request){
        try{
            $id = $_POST['iddocumento'];
            $attributes = array(
                'ele_finanza' => 'Archivo Financiero',
                'ele_finanza_check' => 'Check',
                'ele_obsfinanza' => 'Observaciones'
            );
            $elegible = new Elegible($request->all());
            $elegible->ele_finregistra = date('Y-m-d H:i:s');
            $elegible->ele_finactualiza = date('Y-m-d H:i:s');
            $elegible->idfinanciero_registra = Auth::user()->id;
            $elegible->idfinanciero_actualiza = Auth::user()->id;
            $elegible->idtecnico_registra = Auth::user()->id;
            $elegible->idtecnico_actualiza = Auth::user()->id;
            $elegible->idlegal_registra = Auth::user()->id;
            $elegible->idlegal_actualiza = Auth::user()->id;
            $elegible->ele_finanza_check = ($request->input('ele_finanza_check')=='on')? 1:0;

            if(isset($_POST['btnaceptar'])){
                $elegible->ele_estadofinanza = 'ACEPTADO';
                $elegible->ele_estadotecnico = 'PENDIENTE';
                $validator = Validator::make($request->all(),[
                    'iddocumento' => 'required',
                    'ele_finanza' => 'required|mimes:pdf',
                    'ele_finanza_check' => 'required',
                    'ele_obsfinanza' => 'required|min:10'
                ]);
                $validator->setAttributeNames($attributes);
                if($validator->fails()){
                    Toastr::error('Verificar campos validos para su correción','Error');
                    return redirect()->route('elefin.create',$id)->withErrors($validator)->withInput();
                }
            }elseif(isset($_POST['btnpendiente'])){
                $elegible->ele_estadofinanza = 'PENDIENTE';
                $validator = Validator::make($request->all(),[
                    'iddocumento' => 'required',
                    'ele_finanza' => 'mimes:pdf',
                    'ele_obsfinanza' => 'required|min:20'
                ]);
                $validator->setAttributeNames($attributes);
                if($validator->fails()){
                    Toastr::error('Verificar campos validos para su correción','Error');
                    return redirect()->route('elefin.create',$id)->withErrors($validator)->withInput();
                }
            }elseif(isset($_POST['btnrechazado'])){
                $elegible->ele_estadofinanza = 'RECHAZADO';
                $validator = Validator::make($request->all(),[
                    'iddocumento' => 'required',
                    'ele_finanza' => 'required|mimes:pdf',
                    'ele_finanza_check' => 'required',
                    'ele_obsfinanza' => 'required|min:30'
                ]);
                $validator->setAttributeNames($attributes);
                if($validator->fails()){
                    Toastr::error('Verificar campos validos para su correción','Error');
                    return redirect()->route('elefin.create',$id)->withErrors($validator)->withInput();
                }
            }
            $elegible->save();
            Toastr::success('Los datos del cumplimiento de elegibilidad se registraron de manera correcta','Registro');
        }catch(\Exception $ex){
            Toastr::error('Ocurrio el siguiente error : '.$ex->getMessage(),'Error');
        }
        return redirect()->route('elefin.index');
    }

    public function edit($id){
        $elegible = Elegible::find($id);
        return view('admin.elegible.financiero.edit', compact('elegible'));
    }

    public function update(Request $request, $id){
        try{
            $attributes = array(
                'ele_finanza' => 'Archivo Financiero',
                'ele_finanza_check' => 'Check',
                'ele_obsfinanza' => 'Observaciones'
            );
            $elegible = Elegible::find($id);
            $elegible->fill($request->all());
            $elegible->ele_finactualiza = date('Y-m-d H:i:s');
            $elegible->idfinanciero_actualiza = Auth::user()->id;
            $elegible->ele_finanza_check = ($request->input('ele_finanza_check')=='on')? 1:0;

            if(isset($_POST['btnaceptar'])){
                $elegible->ele_estadofinanza = 'ACEPTADO';
                $elegible->ele_estadotecnico = 'PENDIENTE';
                $validator = Validator::make($request->all(),[
                    'iddocumento' => 'required',
                    'ele_finanza' => 'required|mimes:pdf',
                    'ele_finanza_check' => 'required',
                    'ele_obsfinanza' => 'required|min:10'
                ]);
                $validator->setAttributeNames($attributes);
                if($validator->fails()){
                    Toastr::error('Verificar campos validos para su correción','Error');
                    return redirect()->route('elefin.edit',$id)->withErrors($validator)->withInput();
                }
            }elseif(isset($_POST['btnpendiente'])){
                $elegible->ele_estadofinanza = 'PENDIENTE';
                $validator = Validator::make($request->all(),[
                    'iddocumento' => 'required',
                    'ele_finanza' => 'mimes:pdf',
                    'ele_obsfinanza' => 'required|min:20'
                ]);
                $validator->setAttributeNames($attributes);
                if($validator->fails()){
                    Toastr::error('Verificar campos validos para su correción','Error');
                    return redirect()->route('elefin.edit',$id)->withErrors($validator)->withInput();
                }
            }elseif(isset($_POST['btnrechazado'])){
                $elegible->ele_estadofinanza = 'RECHAZADO';
                $validator = Validator::make($request->all(),[
                    'iddocumento' => 'required',
                    'ele_finanza' => 'required|mimes:pdf',
                    'ele_obsfinanza' => 'required|min:30'
                ]);
                $validator->setAttributeNames($attributes);
                if($validator->fails()){
                    Toastr::error('Verificar campos validos para su correción','Error');
                    return redirect()->route('elefin.edit', $id)->withErrors($validator)->withInput();
                }
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
