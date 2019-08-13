<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ReloadCacheClear extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'all:clear';

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
     * @return mixed
     */
    public function handle()
    {
        $this->call('view:clear');
        $this->call('view:cache');
        $this->call('route:clear');
        $this->call('config:cache');
        exec('rm -fr bootstrap/cache/config.php');
        $this->info('Successfully reload caches.');
    }
}
