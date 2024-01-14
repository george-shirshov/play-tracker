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

    public function buildArray(array $data, string $className): array
    {
        if (!class_exists($className)) {
            throw new InvalidArgumentException("Класс '$className' не определён");
        }

        return $this->jsonMapper->mapArray($data, array(), $className);
    }
}
