<?php

namespace App\Http\Controllers\Pet;

use App\Pet;
use App\Hashtag;
use App\Category;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        $pets = Pet::all();
        $category = Category::find(1);
        $hashtag = Hashtag::find(1);
        //dd($pets->hashtags);
        
        return view('pet.index', compact('pets'));
    }
}
