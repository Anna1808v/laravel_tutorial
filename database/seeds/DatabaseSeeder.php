<?php

use App\Category;
use App\Hashtag;
use App\Pet;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(Category::class)->times(20)->create();
        $hashtags = factory(Hashtag::class)->times(50)->create();
        $pets = factory(Pet::class)->times(200)->create();
        
        foreach($pets as $pet){
            $hashtagsId = $hashtags->random(5)->pluck('id');
            $pet->hashtag()->attach($hashtagsId);
        }
        // $this->call(UserSeeder::class);
    }
}
