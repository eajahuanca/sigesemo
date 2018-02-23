<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Correlativo;
use App\Entidad;
use App\Previous;
use App\Programa;
use Carbon\Carbon;
use DB;
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
        $programas = Programa::where('pro_estado','=', 1)->get();
        return view('admin.previous.create', compact('entidades', 'programas'));
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
                'pre_obs' => 'Observaciones',
                'pre_programa' => 'Programa(s)',
                'pre_municipio' => 'Municipio(s)'
            );
            $previou = new Previous($request->all());
            $previou->idregistra = Auth::user()->id;
            $previou->idactualiza = Auth::user()->id;
            $stringProgramas = "";
            if(count($request->input('pre_programa'))>0){
                for($position = 0; $position < count($request->input('pre_programa')); $position++){
                    $stringProgramas.= $request->input('pre_programa')[$position].",";
                }
            }
            $stringMunicipios = "";
            if(count($request->input('pre_municipio'))>0){
                for($position = 0; $position < count($request->input('pre_municipio')); $position++){
                    $stringMunicipios.= $request->input('pre_municipio')[$position].",";
                }   
            }
            $previou->pre_programa = $stringProgramas;
            $previou->pre_municipio = $stringMunicipios;
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
                    'pre_legal_check' => 'required',
                    'pre_municipio' =>'required',
                    'pre_programa' => 'required'
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
                    'pre_obs' => 'required|min:10',
                    'pre_nota' => 'mimes:pdf',
                    'pre_ficha' => 'mimes:pdf',
                    'pre_legal' => 'mimes:pdf'
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
                    'pre_obs' => 'required|min:10',
                    'pre_nota' => 'mimes:pdf',
                    'pre_ficha' => 'mimes:pdf',
                    'pre_legal' => 'mimes:pdf'
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
        $programas = Programa::where('pro_estado','=', 1)->get();
        $entidades = Entidad::where('ent_estado','=',1)->pluck('ent_nombre','id');
        return view('admin.previous.edit', compact('previou','entidades','programas'));
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
                'pre_obs' => 'Observaciones',
                'pre_programa' => 'Programa(s)',
                'pre_municipio' => 'Municipio(s)'
            );
            $previou = Previous::find($id);
            $previou->fill($request->all());
            $previou->idactualiza = Auth::user()->id;
            $stringProgramas = "";
            if(count($request->input('pre_programa'))>0){
                for($position = 0; $position < count($request->input('pre_programa')); $position++){
                    $stringProgramas.= $request->input('pre_programa')[$position].",";
                }
            }
            $stringMunicipios = "";
            if(count($request->input('pre_municipio'))>0){
                for($position = 0; $position < count($request->input('pre_municipio')); $position++){
                    $stringMunicipios.= $request->input('pre_municipio')[$position].",";
                }   
            }
            $previou->pre_programa = $stringProgramas;
            $previou->pre_municipio = $stringMunicipios;
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
                        'pre_legal_check' => 'required',
                        'pre_programa' => 'required',
                        'pre_municipio' => 'required'
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
                        'pre_obs' => 'required|min:10',
                        'pre_nota' => 'required|mimes:pdf',
                        'pre_ficha' => 'mimes:pdf',
                        'pre_legal' => 'mimes:pdf'
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
                        'pre_obs' => 'required|min:10',
                        'pre_nota' => 'mimes:pdf',
                        'pre_ficha' => 'mimes:pdf',
                        'pre_legal' => 'mimes:pdf'
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

    public function getPieChart(){
        $estado = Previous::cantidadEstados();
        $aceptado = Previous::cantidadAceptadoDepto();
        $pendiente = Previous::cantidadPendienteDepto();
        $rechazado = Previous::cantidadRechazadoDepto();
        $programa = Previous::cantidadProgramas();
        return view('admin.previous.piechart', compact('estado', 'aceptado', 'pendiente', 'rechazado', 'programa'));
    }
}
