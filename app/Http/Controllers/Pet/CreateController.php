<?php

namespace App\Http\Controllers\Pet;

use App\Hashtag;
use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Pet\BaseController;

class CreateController extends BaseController
{
    public function __invoke()
    {
        $categories = Category::all();
        $hashtags = Hashtag::all();

        return view('pet.create',  compact('categories', 'hashtags')); 
    }
}
