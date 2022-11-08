<?php

namespace App\Http\Controllers\Pet;

use App\Pet;
use App\Http\Controllers\Controller;

class ShowController extends Controller
{
    public function __invoke(Pet $pet)
    {
        return view('pet.show', compact('pet'));
        
        dd($pet); 
    }
}
