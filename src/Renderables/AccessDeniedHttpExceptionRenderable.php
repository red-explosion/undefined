<?php

declare(strict_types=1);

namespace RedExplosion\Undefined\Renderables;

use Illuminate\Http\Request;
use RedExplosion\Undefined\Enums\ErrorTypeEnum;
use RedExplosion\Undefined\Responses\ErrorResponse;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class AccessDeniedHttpExceptionRenderable
{
    public function __invoke(AccessDeniedHttpException $exception, Request $request): ErrorResponse|null
    {
        if ($request->expectsJson()) {
            return new ErrorResponse(
                errorType: ErrorTypeEnum::InvalidRequestError,
                message: 'The provided key does not have the required permissions for this endpoint.',
                status: 401,
            );
        }

        return null;
    }
}
