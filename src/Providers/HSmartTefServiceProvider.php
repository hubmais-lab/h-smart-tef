<?php

declare(strict_types=1);

namespace Hubmais\HSmartTef\Providers;

use Illuminate\Support\ServiceProvider;

class HSmartTefServiceProvider extends ServiceProvider
{
    public function register(): void
    {
       /** @noinspection PhpUndefinedMethodInspection */
        $this->app->singleton(\Hubmais\HSmartTef\Services\Manager::class, function ($app) {
            return new \Hubmais\HSmartTef\Services\Manager($app->make(\Hubmais\HClient\Client::class));
        });

        $this->app->singleton('h-smart-tef', function ($app) {
            return $app->make(\Hubmais\HSmartTef\Services\Manager::class);
        });
    }

    public function boot(): void
    {
        
    }
}