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

class ElegibleLegalController extends Controller
{
    public function __construct(){
        Carbon::setLocale('es');
    }

    public function index(){
        $elegible = Elegible::where('ele_estadolegal','=','PENDIENTE')->get();
        return view('admin.elegible.legal.index', compact('elegible'));
    }

    public function edit($id){
        $elegible = Elegible::find($id);
        return view('admin.elegible.legal.edit', compact('elegible'));
    }

    public function update(Request $request, $id){
        try{
            $attributes = array(
                'ele_legal' => 'Archivo Legal',
                'ele_legal_check' => 'Check',
                'ele_obslegal' => 'Observaciones'
            );
            $elegible = Elegible::find($id);
            $elegible->fill($request->all());
            $elegible->ele_legregistra = date('Y-m-d H:i:s');
            $elegible->ele_legactualiza = date('Y-m-d H:i:s');
            $elegible->idlegal_registra = Auth::user()->id;
            $elegible->idlegal_actualiza = Auth::user()->id;
            $elegible->ele_legal_check = ($request->input('ele_tecnica_check')=='on')? 1:0;
            if(isset($_POST['btnaceptar'])){
                $validator = Validator::make($request->all(),[
                    'ele_legal' => 'required|mimes:pdf',
                    'ele_legal_check' => 'required',
                    'ele_obslegal' => 'required|min:10'
                ]);
                $validator->setAttributeNames($attributes);
                if($validator->fails()){
                    Toastr::error('Verificar campos validos para su correción','Error');
                    return redirect()->route('eleleg.edit',$id)->withErrors($validator)->withInput();
                }
                $elegible->ele_estadolegal = "ACEPTADO";
            }elseif(isset($_POST['btnpendiente'])){
                $validator = Validator::make($request->all(),[
                    'ele_legal' => 'mimes:pdf',
                    'ele_obslegal' => 'required|min:20'
                ]);
                $validator->setAttributeNames($attributes);
                if($validator->fails()){
                    Toastr::error('Verificar campos validos para su correción','Error');
                    return redirect()->route('eleleg.edit',$id)->withErrors($validator)->withInput();
                }
                $elegible->ele_estadolegal = "PENDIENTE";
            }elseif(isset($_POST['btnrechazado'])){
                $validator = Validator::make($request->all(),[
                    'ele_legal' => 'mimes:pdf',
                    'ele_obslegal' => 'required|min:20'
                ]);
                $validator->setAttributeNames($attributes);
                if($validator->fails()){
                    Toastr::error('Verificar campos validos para su correción','Error');
                    return redirect()->route('eleleg.edit',$id)->withErrors($validator)->withInput();
                }
                $elegible->ele_estadolegal = 'RECHAZADO';
            }
            $elegible->update();
            Toastr::success('Los datos del cumplimiento de elegibilidad se registraron de manera correcta','Actualización');
        }catch(\Exception $ex){
            Toastr::error('Ocurrio el siguiente error : '.$ex->getMessage(),'Error');
        }
        return redirect()->route('eleleg.index');
    }

    public function show($id){

    }
}
