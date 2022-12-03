<?php

namespace App\Http\Controllers\Pet;

use App\Pet;
use App\Http\Controllers\Controller;
use App\Http\Requests\Pet\StoreRequest;
use App\Http\Resources\Pet\PetResource;
use App\Http\Controllers\Pet\BaseController;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $pet = $this->service->store($data);

        $arr = [
            "name" => $pet->name,
            "animal" => $pet->animal,
            "passport_id" => $pet->passport_id,
        ];

        return new PetResource($pet);
        //return redirect()->route('pet.index');
    }
}
