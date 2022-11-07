<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function hashtags()
    {
        return $this->belongsToMany(Hashtag::class);
    }
}
