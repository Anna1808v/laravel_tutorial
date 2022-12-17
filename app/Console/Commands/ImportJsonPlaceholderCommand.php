<?php

namespace App\Console\Commands;

use App\Pet;
use Illuminate\Console\Command;
use App\Components\ImportDataClient;

class ImportJsonPlaceholderCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:jsonplaceholder';

    protected $description = 'Get data from jsonplaceholder';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $import = new ImportDataClient();
        $response = $import->client->request('GET', 'posts');
        $data = json_decode($response->getBody()->getContents());

        foreach($data as $item){
            Pet::firstOrCreate([
                'name' => $item->title
            ],[
                'name' => $item->title,
                'animal' => $item->body,
                'passport_id' => 333,
                'category_id' => 2,

            ]);
        }
        dd('finish');
    }
}
