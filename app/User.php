<?php

namespace App;

use Caffeinated\Shinobi\Traits\ShinobiTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;
use File;
use Storage;

class User extends Authenticatable
{
    use Notifiable;
    use ShinobiTrait;

    protected $fillable = [
        'id', 'us_nombre', 'us_paterno', 'us_materno',
        'us_carnet', 'us_expedido', 'us_telefono', 'us_genero',
        'idcargo', 'idprofesion', 'us_ingresoasis', 'us_fechaingreso',
        'us_imagen', 'us_nombreimagen', 'us_cuenta', 'us_estado', 'us_observaciones',
        'email', 'password', 'created_at', 'updated_at',
    ];

    protected $hidden = ['password', 'remember_token',];

    public function setPasswordAttribute($password){
        $this->attributes['password'] = bcrypt($password);
    }

    public function setUsImagenAttribute($imagen){
        if($imagen){
            $nuevoNombre = Carbon::now()->year.
                            Carbon::now()->month.
                            Carbon::now()->day. "-".
                            Carbon::now()->hour.
                            Carbon::now()->minute.
                            Carbon::now()->second.".".
                            $imagen->getClientOriginalExtension();
            $this->attributes['us_imagen'] = 'archivo/usuario/'.$nuevoNombre;
            $storage = Storage::disk('usuario')->put($nuevoNombre, \File::get($imagen));
            $this->attributes['us_nombreimagen'] = $imagen->getClientOriginalName();
        }
    }

    public function previous(){
        return $this->hasMany('App\Previous');
    }

    public function elegibles(){
        return $this->hasMany('App\Elegible');
    }

    public function programas(){
        return $this->hasMany('App\Programa');
    }
}
