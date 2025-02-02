<?php

namespace NickKlein\Tags;

use Illuminate\Support\ServiceProvider;
use NickKlein\Tags\Commands\RunSeederCommand;

class TagsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        // Register migrations
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations/');

        $this->commands([
            RunSeederCommand::class,
        ]);
    }
}

