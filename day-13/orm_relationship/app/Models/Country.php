<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $guards = [];

    public function states(){
        return $this->hasMany(State::class);
    }

    //ek coutry ka andr kitna cities han

    public function stateCity(){
        return $this->hasManyThrough(City::class, State::class);
    }
}
