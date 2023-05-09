<?php

declare(strict_types=1);

namespace RedExplosion\Undefined\Exceptions;

use Illuminate\Contracts\Container\Container;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

final class Handler extends ExceptionHandler
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

        $dontFlash = config(key: 'undefined.dont_flash');
        $dontReport = config(key: 'undefined.dont_report');

        $this->dontFlash = is_array($dontFlash) ? $dontFlash : [];
        $this->dontReport = is_array($dontReport) ? $dontReport : [];
    }

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $reportables = config(key: 'undefined.reportables', default: []);
        $renderables = config(key: 'undefined.renderables', default: []);

        collect(value: is_array($reportables) ? $reportables : [])
            ->each(fn (callable $reportUsing) => $this->reportable(reportUsing: $reportUsing));

        collect(value: is_array($renderables) ? $renderables : [])
            ->each(fn (callable $renderUsing) => $this->renderable(renderUsing: $renderUsing));
    }
}
