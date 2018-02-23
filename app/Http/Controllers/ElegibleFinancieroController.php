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
}
