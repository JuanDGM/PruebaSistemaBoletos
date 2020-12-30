<?php

namespace App\models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\models\Boleta;
use App\models\Boletaescenario;

class User extends Authenticatable
{

    use Notifiable;

    protected $fillable = [
        'name', 'cedula','email','celular'
    ];

    public function boletasAsignadas(){
        return $this->hasMany(Boleta::class);
    }

    public function boletosScenario(){
        return $this->hasMany(Boletaescenario::class);
    }

}
