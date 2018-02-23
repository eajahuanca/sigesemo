<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Municipio;
use Carbon\Carbon;

class MunicipioController extends Controller
{
    public function __construct(){
        Carbon::setLocale('es');
    }

    public function getMunicipio(Request $request, $depto){
        if($request->ajax())
        {
            $depto = strtoupper($depto);
            $rpta = Municipio::select('mun_municipio')->where('mun_estado','=',1)->where('mun_depto','=', $depto)->orderBy('mun_municipio','ASC')->get();
            return response()->json($rpta);
        }
        else
            return null;
    }
}
