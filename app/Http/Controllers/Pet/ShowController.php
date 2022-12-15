<?php

namespace App\Http\Controllers\Pet;

use App\Pet;
use App\Http\Controllers\Controller;
use App\Http\Resources\Pet\PetResource;
use App\Http\Controllers\Pet\BaseController;

class ShowController extends BaseController
{
    public function __invoke(Pet $pet)
    {
        return new PetResource($pet);

        //return view('pet.show', compact('pet'));
    }
}
