<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use File;
use Storage;
use Carbon\Carbon;

class Elegible extends Model
{
    protected $table = 'elegibles';
    protected $fillable = [
        'id',
        'iddocumento',
        'ele_finanza',
        'ele_finanza_nombre',
        'ele_finanza_check',
        'ele_obsfinanza',
        'ele_finregistra',
        'ele_finactualiza',
        'idfinanciero_registra',
        'idfinanciero_actualiza',
        'ele_estadofinanza',
        'ele_tecnica',
        'ele_tecnica_nombre',
        'ele_tecnica_check',
        'ele_obstecnica',
        'ele_tecregistra',
        'ele_tecactualiza',
        'idtecnico_registra',
        'idtecnico_actualiza',
        'ele_estadotecnico',
        'ele_legal',
        'ele_legal_nombre',
        'ele_legal_check',
        'ele_obslegal',
        'ele_legregistra',
        'ele_legactualiza',
        'idlegal_registra',
        'idlegal_actualiza',
        'ele_estadolegal',
        'created_at',
        'updated_at'
    ];

    public function setEleFinanzaAttribute($archivo){
        if($archivo){
            $nuevoArchivo = Carbon::now()->year.
                            Carbon::now()->month.
                            Carbon::now()->day. "-".
                            Carbon::now()->hour.
                            Carbon::now()->minute.
                            Carbon::now()->second.".".
                            $archivo->getClientOriginalExtension();
            $this->attributes['ele_finanza'] = 'archivo/elegibles/finanza/'.$nuevoArchivo;
            $storage = Storage::disk('finanza')->put($nuevoArchivo, \File::get($archivo));
            $this->attributes['ele_finanza_nombre'] = $archivo->getClientOriginalName();
        }
    }

    public function setEleTecnicaAttribute($archivo){
        if($archivo){
            $nuevoArchivo = Carbon::now()->year.
                            Carbon::now()->month.
                            Carbon::now()->day. "-".
                            Carbon::now()->hour.
                            Carbon::now()->minute.
                            Carbon::now()->second.".".
                            $archivo->getClientOriginalExtension();
            $this->attributes['ele_tecnica'] = 'archivo/elegibles/tecnica/'.$nuevoArchivo;
            $storage = Storage::disk('tecnica')->put($nuevoArchivo, \File::get($archivo));
            $this->attributes['ele_tecnica_nombre'] = $archivo->getClientOriginalName();
        }
    }

    public function setEleLegalAttribute($archivo){
        if($archivo){
            $nuevoArchivo = Carbon::now()->year.
                            Carbon::now()->month.
                            Carbon::now()->day. "-".
                            Carbon::now()->hour.
                            Carbon::now()->minute.
                            Carbon::now()->second.".".
                            $archivo->getClientOriginalExtension();
            $this->attributes['ele_legal'] = 'archivo/elegibles/legal2/'.$nuevoArchivo;
            $storage = Storage::disk('legal2')->put($nuevoArchivo, \File::get($archivo));
            $this->attributes['ele_legal_nombre'] = $archivo->getClientOriginalName();
        }
    }

    public function documentos(){
        return $this->belongsTo('App\Previous', 'iddocumento', 'id');
    }

    public function userRegistraFinanza(){
        return $this->belongsTo('App\User','idfinanciero_registra', 'id');
    }

    public function userActualizaFinanza(){
        return $this->belongsTo('App\User','idfinanciero_actualiza', 'id');
    }

    public function userRegistraTecnico(){
        return $this->belongsTo('App\User','idtecnico_registra', 'id');
    }

    public function userActualizaTecnico(){
        return $this->belongsTo('App\User','idtecnico_actualiza', 'id');
    }

    public function userRegistraLegal(){
        return $this->belongsTo('App\User','idlegal_registra', 'id');
    }

    public function userActualizaLegal(){
        return $this->belongsTo('App\User','idlegal_actualiza', 'id');
    }
}
