<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;

class ProjectInstall extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'project:install {--force : Do not ask for user confirmation}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install dummy data for the application';

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
        if ($this->option('force')) {
            $this->proceed();
        } else {
            if($this->confirm('This will delete all your current data and install the default dummy data. Are you sure?')) {
                $this->proceed();
            }
        }
    }

    protected function proceed()
    {
        $date = Carbon::now()->format('FY');

        $this->call('storage:link');

        $copySuccess = File::copyDirectory(
            public_path('img/products'),
            public_path("storage/products/$date")
        );

        if ($copySuccess) {
            $this->info('Images successfully copied to stroage folder');
        }

        $this->call('migrate:fresh', [
            '--seed' => true,
            '--force' => true
        ]);

        try {
            $this->call('scout:flush', [
                'model' => Product::class,
            ]);

            $this->call('scout:import', [
                'model' => Product::class,
            ]);
        } catch (\Exception $e) {
            $this->error('Algolia credentials incorrect. Check your .env file.');
        }

        $this->info('Dummy data installed');
    }
}
