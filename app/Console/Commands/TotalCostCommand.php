<?php

namespace App\Console\Commands;

use App\Jobs\TotalCostJob;
use Illuminate\Console\Command;

class TotalCostCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'total:cost';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This runs the job that queries the total values ​​of the orders';

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
        TotalCostJob::dispatch();
        return 0;
    }
}
