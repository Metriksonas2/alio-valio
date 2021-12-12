<?php

namespace App\Enumerable;

class PartEnumTypeEnumerable extends AbstractEnumEnumType
{
    public const TYPE_ENGINE = 1;
    public const TYPE_CARRIER = 2;
    public const TYPE_BREAKS = 3;
    public const TYPE_BODY = 4;
    public const TYPE_LIGHT = 5;
    public const TYPE_BATTERY = 6;
    public const TYPE_OTHER = 7;

    public function getTypesAsArray(): array
    {
        return [
            self::TYPE_ENGINE => 'Variklis',
            self::TYPE_CARRIER => 'Važiuoklė',
            self::TYPE_BREAKS => 'Stabdžiai',
            self::TYPE_BODY => 'Korpusas',
            self::TYPE_LIGHT => 'Apšvietimas',
            self::TYPE_BATTERY => 'Baterija',
            self::TYPE_OTHER => 'Kita elektronika',
        ];
    }
}