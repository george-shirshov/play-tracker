<?php

namespace App\Builder;

use InvalidArgumentException;
use JsonMapper;
use JsonMapper_Exception;
use stdClass;

readonly class Builder
{
    public function __construct(
        private JsonMapper $jsonMapper
    ) {
    }

    /**
     * @throws JsonMapper_Exception
     */
    public function build(object $data, string $className): object
    {
        if (!class_exists($className)) {
            throw new InvalidArgumentException("Класс '$className' не определён");
        }

        return $this->jsonMapper->map($data, $className);
    }

    /**
     * @param array<stdClass> $data
     * @return array<object>
     * @throws JsonMapper_Exception
     */
    public function buildArray(array $data, string $className): array
    {
        if (!class_exists($className)) {
            throw new InvalidArgumentException("Класс '$className' не определён");
        }

        return $this->jsonMapper->mapArray($data, array(), $className);
    }
}
