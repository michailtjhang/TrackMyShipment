<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\File;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (env('APP_ENV') != 'local') {
            URL::forceScheme('https');
        }
        $clockworkPath = '/tmp/clockwork';
        if (!File::exists($clockworkPath)) {
            File::makeDirectory($clockworkPath, 0777, true);
        }
    }
}
