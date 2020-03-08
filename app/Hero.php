<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hero extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'firstName', 'lastName', 'level', 'str', 'dex', 'int', 'exp', 'active'
    ];

    //'race', 'class', 'weapon',

    public function race(){
        return $this->hasOne(HeroRace::class, 'hero_race_id');
    }

    public function heroClass(){
        return $this->hasOne(HeroClass::class, 'hero_class_id');
    }

    public function weapon(){
        return $this->hasOne(Weapon::class, 'weapon_id');
    }
}
