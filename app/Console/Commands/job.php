<?php

namespace App\Console\Commands;

use App\Http\Controllers\ScraperContoller;
use Goutte\Client;
use Illuminate\Console\Command;

class job extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:job';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        (new ScraperContoller())->scraper();
    }

}
