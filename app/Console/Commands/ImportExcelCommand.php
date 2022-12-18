<?php

namespace App\Console\Commands;

use App\Pet;
use App\Imports\PetImport;
use Illuminate\Console\Command;
use App\Components\ImportDataClient;
use Maatwebsite\Excel\Facades\Excel;

class ImportExcelCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:excel';

    protected $description = 'Get data from excel';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Excel::import(new PetImport, public_path('excel/pets.xlsx'));
        dd('finish');
    }
}
