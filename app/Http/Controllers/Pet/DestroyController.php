<?php

namespace App\Http\Controllers\Pet;

use App\Pet;
use App\Http\Controllers\Controller;

class DestroyController extends Controller
{
    public function __invoke(Pet $pet)
    {
        $pet->delete();

        return redirect()->route('pet.index');
    }
}
