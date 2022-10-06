<?php

namespace App\Http\Controllers;

use App\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function index() {
        $pets = Pet::all();
        return view('pet', compact('pets'));
    }

    public function create() {
        $petsArr = [
            [
                'name' => 'boy',
                'animal' => 'dog',
                'passport_id' => '444',
            ], 
            
            [
                'name' => 'another name',
                'animal' => 'another animal',
                'passport_id' => '000',
            ],
        ];

        foreach($petsArr as $item){
            Pet::create([
                'name' => $item['name'],
                'animal' => $item['animal'],
                'passport_id' => $item['passport_id'],
            ]);
        }
        dd('created');
    } 
    
    public function update() {
        $pet = Pet::find(1);
        $pet->update([
            'name' => '111updated',
            'animal' => '1111updated',
            'passport_id' => '9999',

        ]);
        dd('updated');

    }

    public function delete() {
        $pet = Pet::withTrashed()->find(4);
        $pet->restore();
        dd('restore');
    }

    public function firstOrCreate() {

        $anotherPet = [
            'name' => 'firstOrCreate',
            'animal' => 'firstOrCreate',
            'passport_id' => '777',
        ];
        
        $pet = Pet::firstOrCreate([
            'name' => 'firstOrCreate',
        ], [
            'name' => 'firstOrCreate',
            'animal' => 'firstOrCreate',
            'passport_id' => '777',
        ]);

        dump($pet->name);
        dd('firstOrCreate');
    }

    public function updateOrCreate() {

        $anotherPet = [
            'name' => 'updateOrCreate',
            'animal' => 'updateOrCreate',
            'passport_id' => '0777',
        ];

        $pet = Pet::updateOrCreate([
            'name' => 'updateOrCreate',
        ], $anotherPet);

        dd('updateOrCreate');
    }
}
