<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticable;

class Cuenta extends Authenticable
{
    use HasFactory,SoftDeletes;
    
    protected $table = 'cuentas';
    protected $primaryKey = 'user';
    public $incrementing = false;
    protected $keyType = 'string';

    public function perfil(){
        return $this->belongsTo('App\Models\Perfil');
    }

    public function imagenes(){
        return $this->hasMany('App\Models\Imagenes');
    }
}
