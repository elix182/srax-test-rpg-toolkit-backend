<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Hero;
use App\HeroRace;
use App\HeroClass;

class HeroController extends Controller
{
    public function list(){
        $heroes = Hero::all();
        if($heroes->isEmpty()){
            return response()->json([ 'message' => "There aren't any Heroes registered"]);
        }
        return response()->json($heroes);
    }

    public function create(Request $request){

    }

    public function random(){
        $firstNames = explode(', ','Bheizer, Khazun, Grirgel, Murgil, Edraf, En, Grognur, Grum, Surhathion, Lamos, Melmedjad, Shouthes, Che, Jun, Rircurtun, Zelen');
        $lastNames = explode(', ','Nema, Dhusher, Burningsun, Hawkglow, Nav, Kadev, Lightkeeper, Heartdancer,Fivrithrit, Suechit, Tuldethatvo, Vrovakya, Hiao, Chiay, Hogoscu, Vedrimor');
        $race = HeroRace::all()->random();
        $class = $race->availableClasses()->inRandomOrder()->first();
        $weapon = $class->availableWeapons()->inRandomOrder()->first();
        $firstNameIndex = rand(0, count($firstNames)-1);
        $firstName = $firstNames[$firstNameIndex];
        $lastName = '';
        switch($race->name){
            case 'Half-Orc':
            case 'Dragonborn':
                $lastName = '';
                break;
            case 'Elf':
                $lastName = strrev($firstName);
            break;
            case 'Dwarf':
                while(!strpos(strtoupper($lastName), 'R') || !strpos(strtoupper($lastName), 'H')){
                    $lastNameIndex = rand(0, count($firstNames)-1);
                    $lastName = $lastNames[$lastNameIndex];
                }
                break;
            default:
                $lastNameIndex = rand(0, count($lastNames)-1);
                $lastName = $lastNames[$lastNameIndex];
                break;
        }
        $response = [
            'firstName' => $firstName,
            'lastName' => $lastName,
            'race' => $race,
            'class' => $class,
            'weapon' => $weapon
        ];
        return response()->json($response);
    }

    public function edit(Int $id, Request $request){

    }

    public function disable(Int $id){

    }

    public function delete(Int $id){

    }
}
