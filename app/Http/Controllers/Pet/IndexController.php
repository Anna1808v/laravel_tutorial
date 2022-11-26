<?php

namespace App\Http\Controllers\Pet;

use App\Pet;
use App\Hashtag;
use App\Category;
use App\Http\Filters\PetFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Pet\FilterRequest;
use App\Http\Controllers\Pet\BaseController;

class IndexController extends BaseController
{
    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();

        $filter = app()->make(PetFilter::class, ['queryParams' => array_filter($data)]);
        $pets = Pet::filter($filter)->paginate(10);
        //dd($pets);

        // $pets = Pet::paginate(10);
        
        return view('pet.index', compact('pets'));
    }
}
