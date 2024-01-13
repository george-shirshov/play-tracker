<?php

namespace App\Builder;

use InvalidArgumentException;
use JsonMapper;

readonly class Builder
{
    public function __construct(
        private JsonMapper $jsonMapper
    ) {
    }

    public function build(object $data, string $className): object
    {
        if (!class_exists($className)) {
            throw new InvalidArgumentException("Класс '$className' не определён");
        }

        return $this->jsonMapper->map($data, $className);
    }
}
