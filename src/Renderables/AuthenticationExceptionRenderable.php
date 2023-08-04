<?php

declare(strict_types=1);

namespace RedExplosion\Undefined\Renderables;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use RedExplosion\Undefined\Enums\ErrorTypeEnum;
use RedExplosion\Undefined\Responses\ErrorResponse;

class AuthenticationExceptionRenderable
{
    public function __invoke(AuthenticationException $exception, Request $request): ErrorResponse|null
    {
        if (! $request->bearerToken()) {
            return new ErrorResponse(
                errorType: ErrorTypeEnum::InvalidRequestError,
                message: 'You did not provide an API key. You need to provide your API key in the Authorization header, using Bearer auth (e.g. `Authorization: Bearer YOUR_SECRET_KEY`).',
                status: 401,
            );
        }

        return new ErrorResponse(
            errorType: ErrorTypeEnum::InvalidRequestError,
            message: "Invalid API Key provided: {$request->bearerToken()}",
            status: 401,
        );
    }
}
