<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use File;
use Storage;
use DB;
//documentos
class Previous extends Model
{
    protected $table = 'documentos';
    protected $fillable = [
        'id',
        'cus',
        'pre_sigechr',
        'pre_depto',
        'identidad',
        'pre_nota',
        'pre_nota_nombre',
        'pre_nota_check',
        'pre_ficha',
        'pre_ficha_nombre',
        'pre_ficha_check',
        'pre_legal',
        'pre_legal_nombre',
        'pre_legal_check',
        'pre_estado',
        'pre_obs',
        'idregistra',
        'idactualiza',
        'created_at',
        'updated_at'
    ];

    public function setPreNotaAttribute($archivo){
        if($archivo){
            $nuevoArchivo = Carbon::now()->year.
                            Carbon::now()->month.
                            Carbon::now()->day. "-".
                            Carbon::now()->hour.
                            Carbon::now()->minute.
                            Carbon::now()->second.".".
                            $archivo->getClientOriginalExtension();
            $this->attributes['pre_nota'] = 'archivo/previous/nota/'.$nuevoArchivo;
            $storage = Storage::disk('nota')->put($nuevoArchivo, \File::get($archivo));
            $this->attributes['pre_nota_nombre'] = $archivo->getClientOriginalName();
        }
    }

    public function setPreFichaAttribute($archivo){
        if($archivo){
            $nuevoArchivo = Carbon::now()->year.
                            Carbon::now()->month.
                            Carbon::now()->day. "-".
                            Carbon::now()->hour.
                            Carbon::now()->minute.
                            Carbon::now()->second.".".
                            $archivo->getClientOriginalExtension();
            $this->attributes['pre_ficha'] = 'archivo/previous/ficha/'.$nuevoArchivo;
            $storage = Storage::disk('ficha')->put($nuevoArchivo, \File::get($archivo));
            $this->attributes['pre_ficha_nombre'] = $archivo->getClientOriginalName();
        }
    }

    public function setPreLegalAttribute($archivo){
        if($archivo){
            $nuevoArchivo = Carbon::now()->year.
                            Carbon::now()->month.
                            Carbon::now()->day. "-".
                            Carbon::now()->hour.
                            Carbon::now()->minute.
                            Carbon::now()->second.".".
                            $archivo->getClientOriginalExtension();
            $this->attributes['pre_legal'] = 'archivo/previous/legal/'.$nuevoArchivo;
            $storage = Storage::disk('legal')->put($nuevoArchivo, \File::get($archivo));
            $this->attributes['pre_legal_nombre'] = $archivo->getClientOriginalName();
        }
    }

    public function userRegistra(){
        return $this->belongsTo('App\User','idregistra', 'id');
    }

    public function userActualiza(){
        return $this->belongsTo('App\User','idactualiza', 'id');
    }

    public function entidades(){
        return $this->belongsTo('App\Entidad','identidad','id');
    }

    public function elegibles()
    {
        return $this->hasMany('App\Elegible');
    }

    public function scopeCantidadEstados(){
        return DB::table('documentos')
                ->select('pre_estado', DB::raw('count(*) as total'))
                ->groupBy('pre_estado')
                ->get();
    }

    public function scopeCantidadAceptadoDepto(){
        return DB::table('documentos')
                ->select('pre_depto', DB::raw('count(*) as total'))
                ->where('pre_estado','=','ACEPTADO')
                ->groupBy('pre_depto')
                ->get();
    }

    public function scopeCantidadPendienteDepto(){
        return DB::table('documentos')
                ->select('pre_depto', DB::raw('count(*) as total'))
                ->where('pre_estado','=','PENDIENTE')
                ->groupBy('pre_depto')
                ->get();
    }

    public function scopeCantidadRechazadoDepto(){
        return DB::table('documentos')
                ->select('pre_depto', DB::raw('count(*) as total'))
                ->where('pre_estado','=','RECHAZADO')
                ->groupBy('pre_depto')
                ->get();
    }

    public function scopeCantidadProgramas(){
        return DB::table('documentos')
                ->select('pre_programa', DB::raw('count(*) as total'))
                ->where('pre_programa','<>','')
                ->groupBy('pre_programa')
                ->get();
    }
}
