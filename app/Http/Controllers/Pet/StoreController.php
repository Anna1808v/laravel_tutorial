<?php

namespace App\Http\Controllers\Pet;

use App\Pet;
use App\Http\Controllers\Controller;
use App\Http\Requests\Pet\StoreRequest;
use App\Http\Controllers\Pet\BaseController;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        
        $data = $request->validated();

        $this->service->store($data);
        
        return redirect()->route('pet.index');
    }
}
