<?php

namespace NickKlein\Tags\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use NickKlein\News\Seeders\TagsTableSeeder;
use NickKlein\News\Seeders\UserTagsTableSeeder;

class RunSeederCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'run:tags-seeder';

    /**
     * The console Clean up user related things.
     *
     * @var string
     */
    protected $description = 'Runs Seeder for Tags';

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
        Artisan::call('db:seed', ['--class' => TagsTableSeeder::class]);
        $this->info('TagsTableSeeder executed successfully.');

        Artisan::call('db:seed', ['--class' => UserTagsTableSeeder::class]);
        $this->info('UserTagsSEeder executed successfully.');
    }
}
