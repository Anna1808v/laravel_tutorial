<?php

namespace App\Services\Pet;

use App\Pet;
use Exception;
use App\Hashtag;
use App\Category;
use Illuminate\Support\Facades\DB;

class Service
{
    public function store($data)
    {
        try {
            DB::beginTransaction();

            $hashtags = $data['hashtags'];
            $category = $data['category'];
            unset($data['hashtags'], $data['category']);
    
            $hashtagIds = $this->getHashtagIds($hashtags);
            $data['category_id'] = $this->getCategoryId($category);
    
            $pet = Pet::create($data);
    
            $pet->hashtag()->attach($hashtags);

            DB::commit();

        } catch (\Exception $exception) {
            DB::rollback();
            return $exception->getMessage();
        }
        return $pet;
    }

    public function update($pet, $data)
    {
        try {
            DB::beginTransaction(); 

            $hashtags = $data['hashtags'];
            $category = $data['category'];
            unset($data['hashtags'], $data['category']);

            $hashtagIds = $this->getHashtagIdsWithUpdate($hashtags);
            $data['category_id'] = $this->getCategoryIdWithUpdate($category);

            $pet->update($data);
            $pet->hashtag()->sync($hashtagIds);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollback();
            return $exception->getMessage();
        }

        return $pet->fresh();
    }

    private function getCategoryId($item)
    {
        $category = !isset($item['id']) ? Category::create($item) : Category::find($item['id']);
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

    private function getCategoryIdWithUpdate($item)
    {
        if(!isset($item['id'])){
            $category = Category::create($item);
        } else {
            $category = Category::find($item['id']);
            $category->update($item);
            $category = $category->fresh();
        }

        return $category->id;
    }

    private function getHashtagIdsWithUpdate($hashtags) 
    {
        $hashtagIds = [];
        foreach($hashtags as $hashtag){
            if(!isset($hashtag['id'])){
                $hashtag = Hashtag::create($hashtag);
            } else {
                $currentHashtag = Hashtag::find($hashtag['id']);
                $currentHashtag->update($hashtag);
                $hashtag = $currentHashtag->fresh();
            }
            $hashtagIds[] = $hashtag->id;
        }
        return $hashtagIds;
    }
}
