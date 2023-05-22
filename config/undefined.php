<?php

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Don't Flash
    |--------------------------------------------------------------------------
    |
    | The list of the inputs that are never flashed to the session on
    | validation exceptions.
    |
    */

    'dont_flash' => [
        'current_password',
        'password',
        'password_confirmation',
    ],

    /*
    |--------------------------------------------------------------------------
    | Don't Report
    |--------------------------------------------------------------------------
    |
    | A list of the exception types that are not reported.
    |
    */

    'dont_report' => [],

    /*
    |--------------------------------------------------------------------------
    | Reportables
    |--------------------------------------------------------------------------
    |
    | The registered reportable callbacks.
    |
    */

    'reportables' => [],

    /*
    |--------------------------------------------------------------------------
    | Renderables
    |--------------------------------------------------------------------------
    |
    | The registered renderable callbacks.
    |
    */

    'renderables' => [
        \RedExplosion\Undefined\Renderables\AccessDeniedHttpExceptionRenderable::class,
        \RedExplosion\Undefined\Renderables\AuthenticationExceptionRenderable::class,
        \RedExplosion\Undefined\Renderables\NotFoundHttpExceptionRenderable::class,
    ],

];
