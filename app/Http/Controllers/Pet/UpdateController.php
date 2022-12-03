<?php

namespace App\Http\Controllers\Pet;

use App\Pet;
use App\Http\Controllers\Controller;
use App\Http\Resources\Pet\PetResource;
use App\Http\Requests\Pet\UpdateRequest;
use App\Http\Controllers\Pet\BaseController;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Pet $pet)
    {
        $data = $request->validated();

        $pet = $this->service->update($pet, $data);

        return new PetResource($pet);
        //return redirect()->route('pet.show', $pet->id); 
    }
}
