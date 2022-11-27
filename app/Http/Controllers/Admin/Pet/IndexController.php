<?php

namespace App\Http\Controllers\Admin\Pet;

use App\Pet;
use App\Hashtag;
use App\Category;
use App\Http\Filters\PetFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Pet\FilterRequest;

class IndexController extends Controller
{
    public function __invoke()
    {
        // $data = $request->validated();

        // $filter = app()->make(PetFilter::class, ['queryParams' => array_filter($data)]);
        // $pets = Pet::filter($filter)->paginate(10);
        
        // return view('pet.index', compact('pets'));
        return view('admin.pet.index');
    }
}
