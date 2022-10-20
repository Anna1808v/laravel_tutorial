<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hashtag extends Model
{
    public function pets()
    {
        return $this->belongsToMany(Post::class, 'hashtag_posts', 'hashtag_id', 'pet_id');
    }

}
