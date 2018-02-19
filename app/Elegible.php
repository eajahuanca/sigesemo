<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Elegible extends Model
{
    protected $table = 'elegibles';
    protected $fillable = [
        'id',
        'cus',
        'ele_sigechr',
        'ele_finanza',
        'ele_finanza_nombre',
        'ele_finanza_check',
        'ele_tecnica',
        'ele_tecnica_nombre',
        'ele_tecnica_check',
        'ele_legal',
        'ele_legal_nombre',
        'ele_legal_check',
        'ele_estado',
        'ele_obs',
        'idregistra',
        'idactualiza',
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

    public function userRegistra(){
        return $this->belongsTo('App\User','idregistra', 'id');
    }

    public function userActualiza(){
        return $this->belongsTo('App\User','idactualiza', 'id');
    }
}
