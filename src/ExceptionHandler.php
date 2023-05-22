<?php

declare(strict_types=1);

namespace RedExplosion\Undefined;

use Illuminate\Contracts\Container\Container;
use Illuminate\Foundation\Exceptions\Handler;

class ExceptionHandler extends Handler
{
    /**
     * Create a new exception handler instance.
     *
     * @param  Container  $container
     * @return void
     */
    public function __construct(Container $container)
    {
        parent::__construct(container: $container);

        $dontFlash = config(key: 'undefined.dont_flash', default: []);
        $dontReport = config(key: 'undefined.dont_report', default: []);

        $this->dontFlash = is_array($dontFlash) ? $dontFlash : [];
        $this->dontReport = is_array($dontReport) ? $dontReport : [];
    }

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $reportables = (array) config(key: 'undefined.reportables', default: []);
        $renderables = (array) config(key: 'undefined.renderables', default: []);

        collect(value: $reportables)
            // @phpstan-ignore-next-line
            ->each(fn (string $reportable) => $this->reportable(reportUsing: new $reportable()));

        collect(value: $renderables)
            // @phpstan-ignore-next-line
            ->each(fn (string $renderable) => $this->renderable(renderUsing: new $renderable()));
    }
}
