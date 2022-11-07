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
        $pets = Pet::find(4);
        $category = Category::find(1);
        $hashtag = Hashtag::find(1);
        dd($pets->hashtags);
        return view('pet.index', compact('pets'));
    }

    public function create() 
    {
        $categories = Category::all();
        $hashtags = Hashtag::all();

        return view('pet.create',  compact('categories', 'hashtags'));
    } 
    
    public function store() 
    {
        $data = request()->validate([
            'name' => 'required|string',
            'animal' => 'string',
            'passport_id' => 'required|integer',
            'category_id' => 'int',
            'hashtags' => '',
        ]);

        $hashtags = $data['hashtags'];
        unset($data["hashtags"]);

        $pet = Pet::create($data);
        // foreach($hashtags as $hashtag){
        //     HashtagPet::firstOrcreate([
        //         'hashtag_id' => $hashtag,
        //         'pet_id' => $pet->id,
        //     ]);
        // }
        $pet->hashtag()->attach($hashtags);
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
        $hashtags = Hashtag::all();

        return view('pet.edit', compact('pet', 'categories','hashtags'));
    }

    public function update(Pet $pet) 
    {

        $data = request()->validate([
            'name' => 'string',
            'animal' => 'string',
            'passport_id' => 'integer',
            'category_id' => 'int',
            'hashtags' => '',
        ]);
        $hashtags = $data['hashtags'];
        unset($data["hashtags"]);

        $pet->update($data);
        $pet->hashtag()->sync($hashtags);
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
