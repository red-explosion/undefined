<?php

declare(strict_types=1);

namespace RedExplosion\Undefined\Responses;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;
use RedExplosion\Undefined\Enums\ErrorTypeEnum;
use Symfony\Component\HttpFoundation\Response;

class ErrorResponse implements Responsable
{
    public function __construct(
        public readonly ErrorTypeEnum $errorType,
        public readonly string $message,
        public readonly int $status = 200,
    ) {
    }

    public function toResponse($request): Response
    {
        return new JsonResponse(
            data: [
                'error' => [
                    'type' => $this->errorType->value,
                    'message' => $this->message,
                ],
            ],
            status: $this->status,
        );
    }
}
