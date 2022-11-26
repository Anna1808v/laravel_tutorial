<?php

namespace App\Http\Filters;

use App\Http\Filters\AbstractFilter;
use Illuminate\Database\Eloquent\Builder;

class PetFilter extends AbstractFilter
{
    public const NAME = 'name';
    public const ANIMAL = 'animal';
    public const CATEGORY_ID = 'category_id';

    protected function getCallbacks(): array
    {
        return [
            self::NAME => [$this, 'name'],
            self::ANIMAL => [$this, 'animal'],
            self::CATEGORY_ID => [$this, 'category_id'],
        ];
    }

    public function name(Builder $builder, $value){
        $builder->where('name', 'like', "%{$value}%");
    }

    public function animal(Builder $builder, $value){
        $builder->where('animal', 'like', "%{$value}%");
    }

    public function category_id(Builder $builder, $value){
        $builder->where('category_id', $value);
    }

}
