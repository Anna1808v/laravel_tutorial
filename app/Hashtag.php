<?php

namespace App;

use App\Pet;
use App\Hashtag;
use Illuminate\Database\Eloquent\Model;

class Hashtag extends Model
{

    protected $guarded = false;

    public function pets()
    {
        return $this->belongsToMany(Pet::class);
    }
}
