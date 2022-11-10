<?php

namespace App\Services\Pet;

use App\Pet;


class Service
{
    public function store($data)
    {
        $hashtags = $data['hashtags'];
        unset($data["hashtags"]);

        $pet = Pet::create($data);
        $pet->hashtag()->attach($hashtags);
    }

    public function update($pet, $data)
    {
        $hashtags = $data['hashtags'];
        unset($data["hashtags"]);

        $pet->update($data);
        $pet->hashtag()->sync($hashtags);
    }
}
