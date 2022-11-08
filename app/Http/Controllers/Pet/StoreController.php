<?php

namespace App\Http\Controllers\Pet;

use App\Pet;
use App\Http\Controllers\Controller;

class StoreController extends Controller
{
    public function __invoke()
    {
        $data = request()->validate([
            'name' => 'required|string',
            'animal' => 'string',
            'passport_id' => 'required|integer',
            'category_id' => 'int',
            'hashtags' => '',
        ]);

        $hashtags = $data['hashtags'];
        unset($data["hashtags"]);

        $pet = Pet::create($data);
        // foreach($hashtags as $hashtag){
        //     HashtagPet::firstOrcreate([
        //         'hashtag_id' => $hashtag,
        //         'pet_id' => $pet->id,
        //     ]);
        // }
        $pet->hashtag()->attach($hashtags);
        return redirect()->route('pet.index');
    }
}
