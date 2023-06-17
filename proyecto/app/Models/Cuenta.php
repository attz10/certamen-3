<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    use HasFactory;

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
