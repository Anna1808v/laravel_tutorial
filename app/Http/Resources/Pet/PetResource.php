<?php

namespace App\Http\Resources\Pet;

use App\Http\Resources\Hashtag\HashtagResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Category\CategoryResource;

class PetResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "animal" => $this->animal,
            "passport_id" => $this->passport_id,
            //"category_id" => $this->category_id,
            "category" => new CategoryResource($this->category),
            "hashtags" => HashtagResource::collection($this->hashtag)
        ];
    }
}
