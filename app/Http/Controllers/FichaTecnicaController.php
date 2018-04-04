<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Previous;
use App\Fichatecnica;
use App\Contribucion;
use Carbon\Carbon;
use Toastr;

class FichaTecnicaController extends Controller
{
    public function __construct(){
        Carbon::setlocale('es');
    }

    public function index(){
        $documento = Previous::where('pre_estado', '=', 'ACEPTADO')->get();
        return view('admin.fichatecnica.index', compact('documento'));
    }
    public function create($iddocumentos){
        return view('admin.fichatecnica.create', compact('iddocumentos'));
    }

    public function store(Request $request){
        try{
            $ficha = new Fichatecnica($request->all());
            //PUNTAJE 30 - PERTINENCIA
            $ficha->pertinencia = implode(',', $_POST['pertinencia']);

            //PUNTAJE 20 -MAGNITUD
            $ficha->mag_region = implode(',', $_POST['mag_region']);
            $ficha->mag_superficie = implode(',', $_POST['mag_superficie']);
            $ficha->mag_investigacion = implode(',', $_POST['mag_investigacion']);
            $ficha->cob_deptos = implode(',', $_POST['cob_deptos']);
           
            if($_POST['mag_suplapaz']){
                $ficha->mag_suplapazp = $request->input('mag_suplapaz') * 100.00 / Contribucion::lapaz(); 
            }else{
                $ficha->mag_suplapaz = 0.00;
                $ficha->mag_suplapazp = 0.00;
            }

            if($_POST['mag_suporuro']){
                $ficha->mag_suporurop = $request->input('mag_suporuro') * 100.00 / Contribucion::oruro(); 
            }else{
                $ficha->mag_suporuro = 0.00;
                $ficha->mag_suporurop = 0.00;
            }

            if($_POST['mag_suppotosi']){
                $ficha->mag_suppotosip = $request->input('mag_suppotosi') * 100.00 / Contribucion::potosi(); 
            }else{
                $ficha->mag_suppotosi = 0.00;
                $ficha->mag_suppotosip = 0.00;
            }

            if($_POST['mag_supcochabamba']){
                $ficha->mag_supcochabambap = $request->input('mag_supcochabamba') * 100.00 / Contribucion::cochabamba(); 
            }else{
                $ficha->mag_supcochabamba = 0.00;
                $ficha->mag_supcochabambap = 0.00;
            }

            if($_POST['mag_supsantacruz']){
                $ficha->mag_supsantacruzp = $request->input('mag_supsantacruz') * 100.00 / Contribucion::santacruz(); 
            }else{
                $ficha->mag_supsantacruz = 0.00;
                $ficha->mag_supsantacruzp = 0.00;
            }

            if($_POST['mag_supchuquisaca']){
                $ficha->mag_supchuquisacap = $request->input('mag_supchuquisaca') * 100.00 / Contribucion::chuquisaca(); 
            }else{
                $ficha->mag_supchuquisaca = 0.00;
                $ficha->mag_supchuquisacap = 0.00;
            }

            if($_POST['mag_suptarija']){
                $ficha->mag_suptarijap = $request->input('mag_suptarija') * 100.00 / Contribucion::tarija(); 
            }else{
                $ficha->mag_suptarija = 0.00;
                $ficha->mag_suptarijap = 0.00;
            }

            if($_POST['mag_suppando']){
                $ficha->mag_suppandop = $request->input('mag_suppando') * 100.00 / Contribucion::pando(); 
            }else{
                $ficha->mag_suppando = 0.00;
                $ficha->mag_suppandop = 0.00;
            }

            if($_POST['mag_supbeni']){
                $ficha->mag_supbenip = $request->input('mag_supbeni') * 100.00 / Contribucion::beni(); 
            }else{
                $ficha->mag_supbeni = 0.00;
                $ficha->mag_supbenip = 0.00;
            }
            
            if($_POST['mag_supnacional']){
                $ficha->mag_supnacionalp = $request->input('mag_supnacional') * 100.00 / Contribucion::nacional(); 
            }else{
                $ficha->mag_supnacional = 0.00;
                $ficha->mag_supnacionalp = 0.00;
            }

            //PUNTAJE 30 - COMPLEJIDAD
            $ficha->com_infraestructura_val = $request->input('com_infraestructura') ? 5.00 : 0.00;
            $ficha->com_produccion_val = $request->input('com_produccion') ? 7.50 : 0.00;
            $ficha->com_forestacion_val = $request->input('com_forestacion') ? 25.00 : 0.00;
            $ficha->com_plantaciones_val = $request->input('com_plantaciones') ? 25.00 : 0.00;
            $ficha->com_capacidades_val = $request->input('com_capacidades') ? 5.00 : 0.00;
            $ficha->com_investigacion_val = $request->input('com_investigacion') ? 17.50 : 0.00;
            $ficha->com_tecnologia_val = $request->input('com_tecnologia') ? 10.00 : 0.00;
            $ficha->com_manejo_val = $request->input('com_manejo') ? 5.00 : 0.00;

            //PUNTAJE 20 - COBERTURA
            $ficha->cob_municipio_total = $request->input('cob_municipio_total')? $request->input('cob_municipio_total') : 0.00;
            $ficha->cob_municipio_abarca = $request->input('cob_municipio_abarca')? $request->input('cob_municipio_abarca') : 0.00;
            $ficha->cob_comunidad_total = $request->input('cob_comunidad_total')? $request->input('cob_comunidad_total') : 0.00;
            $ficha->cob_comunidad_abarca = $request->input('cob_comunidad_abarca')? $request->input('cob_comunidad_abarca') : 0.00;

            $ficha->idregistra = Auth::user()->id;
            $ficha->idactualiza = Auth::user()->id;

            $ficha->save();
            Toastr::success('Los datos de la Ficha Técnica se registraron de manera correcta','Registro');
        }catch(\Exception $ex){
            Toastr::error('Ocurrio el siguiente error : '.$ex->getMessage(),'Error');
        }
        return redirect()->route('ficha.index');
    }
}
