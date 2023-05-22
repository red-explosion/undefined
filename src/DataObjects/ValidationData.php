<?php

declare(strict_types=1);

namespace RedExplosion\Undefined\DataObjects;

class ValidationData
{
    public function __construct(
        public readonly string $parameter,
        public readonly string $rule,
        public readonly string $message,
    ) {
    }
}
