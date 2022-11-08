<?php

namespace App\Http\Controllers\Pet;

use App\Pet;
use App\Http\Controllers\Controller;

class UpdateController extends Controller
{
    public function __invoke(Pet $pet)
    {
        $data = request()->validate([
            'name' => 'string',
            'animal' => 'string',
            'passport_id' => 'integer',
            'category_id' => 'int',
            'hashtags' => '',
        ]);
        $hashtags = $data['hashtags'];
        unset($data["hashtags"]);

        $pet->update($data);
        $pet->hashtag()->sync($hashtags);
        return redirect()->route('pet.show', $pet->id); 
    }
}
