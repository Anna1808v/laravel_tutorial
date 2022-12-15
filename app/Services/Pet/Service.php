<?php

namespace App\Services\Pet;

use App\Pet;
use App\Hashtag;

class Service
{
    public function store($data)
    {
        $hashtags = $data['hashtags'];

        $category = $data['category'];

        unset($data['hashtags'], $data['category']);


        $hashtagIds = $this->getHashtagIds($hashtags);
        $data['categoty_id'] = $this->getCategoryId($category);

        $pet = Pet::create($data);

        $pet->hashtags()->attach($hashtags);

        return $pet;
    }

    public function update($pet, $data)
    {
        $hashtags = $data['hashtags'];
        unset($data['hashtags']);

        $pet->update($data);
        $pet->hashtags()->sync($hashtags);
        return $pet->fresh();
    }

    private function getCategoryId($item)
    {
        $category = !isset($item['id']) ? Category::create($category) : Category::find($item['id']);
    }

    private function getHashtagIds($hashtags) 
    {
        $hashtagIds = [];
        foreach($hashtags as $hashtag){
            
            $hashtag = !isset($hashtag['id']) ? Hashtag::create($hashtag) : Hashtag::find($hashtag['id']);
            $hashtagIds[] = $hashtag->id;
        }
        return $hashtagIds;
    }
}
