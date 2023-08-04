<?php

declare(strict_types=1);

namespace RedExplosion\Undefined\Renderables;

use Illuminate\Http\Request;
use RedExplosion\Undefined\Enums\ErrorTypeEnum;
use RedExplosion\Undefined\Responses\ErrorResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class NotFoundHttpExceptionRenderable
{
    public function __invoke(NotFoundHttpException $exception, Request $request): ErrorResponse|null
    {
        $path = $request->path() !== '/' ? "/{$request->path()}" : '/';

        return new ErrorResponse(
            errorType: ErrorTypeEnum::InvalidRequestError,
            message: "Unrecognised request URL ({$request->method()} $path).",
            status: 404,
        );
    }
}
