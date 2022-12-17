<?php

namespace App\Http\Controllers\Pet;

use App\Pet;
use App\Services\Pet\Service;
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
        
        return $pet instanceof Pet ? new PetResource($pet) : $pet;
        //return redirect()->route('pet.index');
    }
}
