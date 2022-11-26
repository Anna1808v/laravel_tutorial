<?php
namespace App;

use App\Hashtag;
use App\Category;
use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use Filterable;

    protected $guarded = false;

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function hashtag()
    {
        return $this->belongsToMany(Hashtag::class,'hashtag_pet', 'pet_id', 'hashtag_id');
    }
}
