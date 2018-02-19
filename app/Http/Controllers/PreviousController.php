<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Correlativo;
use App\Entidad;
use App\Previous;
use Carbon\Carbon;
use Toastr;

class PreviousController extends Controller
{
    public function __construct(){
        Carbon::setLocale('es');
    }

    public function index(){
        $previou = Previous::orderBy('created_at','DESC')->get();
        return view('admin.previous.index', compact('previou'));
    }

    public function create(){
        $entidades = Entidad::where('ent_estado','=',1)->pluck('ent_nombre','id');
        return view('admin.previous.create', compact('entidades'));
    }

    public function store(Request $request){
        try{
            $attributes = array(
                'pre_sigechr' => 'Hoja de Ruta',
                'pre_depto' => 'Departamento',
                'identidad' => 'Entidades',
                'pre_nota' => 'Nota (Archivo PDF)',
                'pre_nota_check' => 'Nota',
                'pre_ficha' => 'Ficha (Archivo PDF)',
                'pre_ficha_check' => 'Ficha',
                'pre_legal' => 'Legal (Archivo PDF)',
                'pre_legal_check' => 'Legal',
                'pre_obs' => 'Observaciones'
            );
            $previou = new Previous($request->all());
            $previou->idregistra = Auth::user()->id;
            $previou->idactualiza = Auth::user()->id;
            if(isset($_POST['btnaceptar'])){
                $previou->pre_estado = 'ACEPTADO';
                $validator = Validator::make($request->all(), [
                    'pre_sigechr' => 'required|min:5',
                    'pre_depto' => 'required',
                    'identidad' => 'required',
                    'pre_nota' => 'required|mimes:pdf',
                    'pre_nota_check' => 'required',
                    'pre_ficha' => 'required|mimes:pdf',
                    'pre_ficha_check' => 'required',
                    'pre_legal' => 'required|mimes:pdf',
                    'pre_legal_check' => 'required'
                ]);
                $validator->setAttributeNames($attributes);
                if ($validator->fails()) {
                    return redirect('previous/create')->withErrors($validator)->withInput();
                }
            }
            elseif(isset($_POST['btnpendiente'])){
                $previou->pre_estado = 'PENDIENTE';
                $validator = Validator::make($request->all(), [
                    'pre_sigechr' => 'required|min:5',
                    'pre_depto' => 'required',
                    'identidad' => 'required',
                    'pre_obs' => 'required|min:10'
                ]);
                $validator->setAttributeNames($attributes);
                if ($validator->fails()) {
                    return redirect('previous/create')->withErrors($validator)->withInput();
                }
            }
            elseif(isset($_POST['btnrechazado'])){
                $previou->pre_estado = 'RECHAZADO';
                $validator = Validator::make($request->all(), [
                    'pre_sigechr' => 'required|min:5',
                    'pre_depto' => 'required',
                    'identidad' => 'required',
                    'pre_obs' => 'required|min:10'
                ]);
                $validator->setAttributeNames($attributes);
                if ($validator->fails()) {
                    return redirect('previous/create')->withErrors($validator)->withInput();
                }
            }
            $correlativo = Correlativo::where('cor_estado','=',1)->first();
            $previou->cus = $correlativo->cor_cite.$this->correlativo($correlativo->cor_valor).'-'.$correlativo->cor_gestion;
            $previou->save();
            $correlativo->cor_valor = $correlativo->cor_valor + 1;
            $correlativo->update();
            Toastr::success('Los datos de las documentaciones previas se registraron de manera correcta','Registro');
        }catch(\Exception $ex){
            Toastr::error('Ocurrio el siguiente error : '.$ex->getMessage(),'Error');
        }
        return redirect()->route('previous.index');
    }

    public function edit($id){
        $previou = Previous::find($id);
        $entidades = Entidad::where('ent_estado','=',1)->pluck('ent_nombre','id');
        return view('admin.previous.edit', compact('previou','entidades'));
    }

    public function update(Request $request, $id){
        try{
            $attributes = array(
                'pre_sigechr' => 'Hoja de Ruta',
                'pre_depto' => 'Departamento',
                'identidad' => 'Entidades',
                'pre_nota' => 'Nota (Archivo PDF)',
                'pre_nota_check' => 'Nota',
                'pre_ficha' => 'Ficha (Archivo PDF)',
                'pre_ficha_check' => 'Ficha',
                'pre_legal' => 'Legal (Archivo PDF)',
                'pre_legal_check' => 'Legal',
                'pre_obs' => 'Observaciones'
            );
            $previou = Previous::find($id);
            $previou->fill($request->all());
            $previou->idactualiza = Auth::user()->id;
            if($previou->pre_estado == 'PENDIENTE'){
                if(isset($_POST['btnaceptar'])){
                    $previou->pre_estado = 'ACEPTADO';
                    $validator = Validator::make($request->all(), [
                        'pre_sigechr' => 'required|min:5',
                        'pre_depto' => 'required',
                        'identidad' => 'required',
                        'pre_nota' => 'required|mimes:pdf',
                        'pre_nota_check' => 'required',
                        'pre_ficha' => 'required|mimes:pdf',
                        'pre_ficha_check' => 'required',
                        'pre_legal' => 'required|mimes:pdf',
                        'pre_legal_check' => 'required'
                    ]);
                    $validator->setAttributeNames($attributes);
                    if ($validator->fails()) {
                        return redirect('previous/'.$id.'/edit')->withErrors($validator)->withInput();
                    }
                }
                elseif(isset($_POST['btnpendiente'])){
                    $previou->pre_estado = 'PENDIENTE';
                    $validator = Validator::make($request->all(), [
                        'pre_sigechr' => 'required|min:5',
                        'pre_depto' => 'required',
                        'identidad' => 'required',
                        'pre_obs' => 'required|min:10'
                    ]);
                    $validator->setAttributeNames($attributes);
                    if ($validator->fails()) {
                        return redirect('previous/'.$id.'/edit')->withErrors($validator)->withInput();
                    }
                }
                elseif(isset($_POST['btnrechazado'])){
                    $previou->pre_estado = 'RECHAZADO';
                    $validator = Validator::make($request->all(), [
                        'pre_sigechr' => 'required|min:5',
                        'pre_depto' => 'required',
                        'identidad' => 'required',
                        'pre_obs' => 'required|min:10'
                    ]);
                    $validator->setAttributeNames($attributes);
                    if ($validator->fails()) {
                        return redirect('previous/'.$id.'/edit')->withErrors($validator)->withInput();
                    }
                }
                $previou->update();
                Toastr::success('Los datos de las documentaciones previas se actualizaron de manera correcta','Actualización');
            }else{
                Toastr::error('Los documentos previos de la solicitud ya no pueden ser actualizados, ya que se encuentra en estado ACEPTADO/RECHAZADO','Error');
            }
        }catch(\Exception $ex){
            Toastr::error('Ocurrio el siguiente error : '.$ex->getMessage(),'Error');
        }
        return redirect()->route('previous.index');
    }

    public function show($id){
        $previous = Previous::find($id);
        return view('admin.previous.show', compact('previous'));
    }

    public function correlativo($valor){
        if($valor<10)
            return '000'.$valor;
        if($valor>=10 && $valor<100)
            return '00'.$valor;
        if($valor>=100 && $valor<1000)
            return '0'.$valor;
        if($valor>=1000)
            return $valor;
    }
}
