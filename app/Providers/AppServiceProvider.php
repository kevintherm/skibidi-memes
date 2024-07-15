<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

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
        Blade::directive('convertUsernames', function ($expression) {
            return "<?= preg_replace('/@(\w+)/', '<a class=\"link-underline link-underline-opacity-0\" href=\"/user/$1\">@$1</a>', $expression); ?>";
        });
    }
}
