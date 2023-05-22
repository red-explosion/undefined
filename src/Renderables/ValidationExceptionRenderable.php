<?php

declare(strict_types=1);

namespace RedExplosion\Undefined\Renderables;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use RedExplosion\Undefined\DataObjects\ValidationData;
use RedExplosion\Undefined\Enums\ErrorTypeEnum;
use RedExplosion\Undefined\Responses\ErrorResponse;

class ValidationExceptionRenderable
{
    public function __invoke(ValidationException $exception, Request $request): ErrorResponse|null
    {
        if ($request->expectsJson()) {
            /** @var ValidationData $validationError */
            $validationError = collect($exception->errors())
                ->flatMap(function (array $errors, string $parameter) use ($exception) {
                    return collect($errors)
                        ->map(function ($message) use ($exception, $parameter) {
                            /** @var string $rule */
                            $rule = array_keys($exception->validator->failed()[$parameter])[0];

                            return new ValidationData(
                                parameter: $parameter,
                                rule: mb_strtolower($rule),
                                message: $message,
                            );
                        });
                })
                ->first();

            return new ErrorResponse(
                errorType: ErrorTypeEnum::InvalidRequestError,
                message: $validationError->message,
                code: "parameter_{$validationError->rule}",
                param: $validationError->parameter,
                status: 422,
            );
        }

        return null;
    }
}
