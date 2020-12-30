<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

use App\models\User;

class Boletaescenario extends Model
{
    protected $fillable = ['user_id','numero_boleto'];

    public function usuario(){
        return $this->belongsToMany(User::class);
    }

}
