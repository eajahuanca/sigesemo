<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Previous;
use App\Elegible;
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
            $attributes = array(
                'ele_finanza' => 'Archivo Financiero',
                'ele_finanza_check' => 'Check',
                'ele_obsfinanza' => 'Observaciones'
            );
            $elegible = new Elegible($request->all());
            $elegible->elefinregistra = date('Y-m-d H:i:s');
            $elegible->elefinactualiza = date('Y-m-d H:i:s');
            $elegible->idfinanciero_registra = Auth::user()->id;
            $elegible->idfinanciero_actualiza = Auth::user()->id;

        }catch(\Exception $ex){
            Toastr::error('Ocurrio el siguiente error : '.$ex->getMessage(),'Error');
        }
        return redirect()->route('elefin.index');
    }
}
