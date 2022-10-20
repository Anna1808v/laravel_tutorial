<?php

namespace App\Http\Controllers;

use App\Pet;
use App\Hashtag;
use App\Category;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function index() 
    {
        $pets = Pet::all();
        return view('pet.index', compact('pets'));
    }

    public function create() 
    {
        $categories = Category::all();
        return view('pet.create',  compact('categories'));
    } 
    
    public function store() 
    {
        $data = request()->validate([
            'name' => 'string',
            'animal' => 'string',
            'passport_id' => 'integer',
            'category_id' => 'int',
        ]);
        Pet::create($data);
        return redirect()->route('pet.index');
    } 

    public function show(Pet $pet) 
    {
        return view('pet.show', compact('pet'));
        dd($pet);
    }

    public function edit(Pet $pet) 
    {
        $categories = Category::all();
        return view('pet.edit', compact('pet', 'categories'));
    }

    public function update(Pet $pet) 
    {

        $data = request()->validate([
            'name' => 'string',
            'animal' => 'string',
            'passport_id' => 'integer',
            'category_id' => 'int',
        ]);
        $pet->update($data);
        return redirect()->route('pet.show', $pet->id); 
    }

    public function delete() 
    {
        $pet = Pet::withTrashed()->find(4);
        $pet->restore();
        dd('restore');
    }

    public function destroy(Pet $pet) 
    {
        $pet->delete();
        return redirect()->route('pet.index');
    }

    public function firstOrCreate() 
    {

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

    public function updateOrCreate() 
    {

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
