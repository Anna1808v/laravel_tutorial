<?php

namespace App\Imports;

use App\Pet;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PetImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $item){
            if(isset($item['name']) && $item['name'] != null){
                Pet::firstOrCreate([
                    'name' => $item['name'],
                ],[
                    'name' => $item['name'],
                    'animal' => $item['animal'],
                    'passport_id' => $item['passport_id'],
                    'category_id' => $item['category']
                ]);
            }
        }
    }
}
