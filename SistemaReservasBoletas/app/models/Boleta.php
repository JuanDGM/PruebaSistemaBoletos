<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\models\User;

class Boleta extends Model
{
    use SoftDeletes;

    protected $fillable = ['user_id'];

    public function usuario(){
        return $this->belongsToMany(User::class);
    }

}
