<?php

declare(strict_types=1);

namespace RedExplosion\Undefined;

use Illuminate\Support\ServiceProvider;

final class UndefinedServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(
            path: __DIR__ . '/../config/undefined.php',
            key: 'undefined',
        );
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes(
                paths: [
                    __DIR__ . '/../config/undefined.php' => config_path('undefined.php'),
                ],
                groups: 'undefined-config',
            );
        }
    }
}
