<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class ElegibleTecnicoController extends Controller
{
    public function __construct(){
        Carbon::setLocale('es');
    }

    public function index(){
        return view('admin.elegible.index');
    }
}