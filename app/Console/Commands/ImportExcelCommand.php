<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Components\ImportDataClient;
use App\Post;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PostsImport;

class ImportExcelCommand extends Command
{
    protected $signature = 'import:excel';

    protected $description = 'Get data from Excel';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Excel::import(new PostsImport(), public_path('excel/posts.xlsx'));

        dd('finish');
    }
}
