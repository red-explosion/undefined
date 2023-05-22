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
        public readonly ?string $code = null,
        public readonly ?string $param = null,
        public readonly int $status = 200,
    ) {
    }

    public function toResponse($request): Response
    {
        $error = [
            'type' => $this->errorType->value,
            'code' => $this->code,
            'message' => $this->message,
            'param' => $this->param,
        ];

        if (! $this->code) {
            unset($error['code']);
        }

        if (! $this->param) {
            unset($error['param']);
        }

        return new JsonResponse(
            data: [
                'error' => $error,
            ],
            status: $this->status,
        );
    }
}
