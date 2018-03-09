<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FichaTecnicaController extends Controller
{
    public function index(){
        return view('admin.fichatecnica.index');
    }
}
