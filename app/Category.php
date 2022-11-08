<?php

namespace App;

use App\Category;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $guarded = false;

    public function pets()
    {
        return $this->hasMany(Pet::class);
    }
        
}
