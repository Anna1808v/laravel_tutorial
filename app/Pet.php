<?php

namespace App;

use App\Pet;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{

    protected $guarded = false;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function hashtag()
    {
        return $this->belongsToMany(Hashtag::class);
    }
}
