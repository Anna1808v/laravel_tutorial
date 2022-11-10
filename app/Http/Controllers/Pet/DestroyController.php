<?php

namespace App\Http\Controllers\Pet;

use App\Pet;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Pet\BaseController;

class DestroyController extends BaseController
{
    public function __invoke(Pet $pet)
    {
        $pet->delete();

        return redirect()->route('pet.index');
    }
}
