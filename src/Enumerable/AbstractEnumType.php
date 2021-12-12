<?php

namespace App\Enumerable;

abstract class AbstractEnumType implements EnumTypeInterface
{
    public function getType(?int $id): mixed
    {
        return $id === null ? null : $this->getTypesAsArray()[$id];
    }
}