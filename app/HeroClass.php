<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HeroClass extends Model
{
    protected $fillable = [
        'name', 'description' //, 'skills'
    ];

    public function availableWeapons(){
        return $this->hasMany(Weapon::class);
    }
}
