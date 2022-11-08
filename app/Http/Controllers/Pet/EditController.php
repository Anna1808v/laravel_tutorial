<?php

namespace App\Http\Controllers\Pet;

use App\Pet;
use App\Hashtag;
use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Pet\EditController;

class EditController extends Controller
{
    public function __invoke(Pet $pet)
    {
        $categories = Category::all();
        $hashtags = Hashtag::all();

        return view('pet.edit', compact('pet', 'categories','hashtags'));
    }
}
