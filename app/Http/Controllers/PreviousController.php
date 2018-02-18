<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        return view('admin.previous.create');
    }

    public function store(Request $request){
        try{
            //dd($request);
            $previou = new Previous($request->all());
            $previou->idregistra = Auth::user()->id;
            $previou->idactualiza = Auth::user()->id;
            $previou->save();
            Toastr::success('Los datos de las documentaciones previas se registraron de manera correcta','Registro');
        }catch(\Exception $ex){
            Toastr::error('Ocurrio el siguiente error : '.$ex->getMessage(),'Error');
        }
        return redirect()->route('previous.index');
    }

    public function edit($id){
        $previou = Previous::find($id);
        return view('admin.previous.edit', compact('previou'));
    }

    public function update(Request $request, $id){
        try{
            $previou = Previous::find($id);
            $previou->fill($request->all());
            $previou->idactualiza = Auth::user()->id;
            $previou->update();
            Toastr::success('Los datos de las documentaciones previas se actualizaron de manera correcta','Actualización');
        }catch(\Exception $ex){
            Toastr::error('Ocurrio el siguiente error : '.$ex->getMessage(),'Error');
        }
        return redirect()->route('previous.index');
    }

    public function show($id){
        $previous = Previous::find($id);
        return view('admin.previous.show', compact('previous'));
    }
}
