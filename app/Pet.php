<?php

namespace App;

use App\Pet;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pet extends Model
{
    use SoftDeletes;
    
    protected $table = 'pets';
    protected $guarded = false;

    public function category() 
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
