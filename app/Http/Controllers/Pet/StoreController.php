<?php

namespace App\Http\Controllers\Pet;

use App\Pet;
use App\Http\Controllers\Controller;
use App\Http\Requests\Pet\StoreRequest;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $hashtags = $data['hashtags'];
        unset($data["hashtags"]);

        $pet = Pet::create($data);

        $pet->hashtag()->attach($hashtags);
        return redirect()->route('pet.index');
    }
}
