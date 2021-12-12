<?php

namespace App\Enumerable;

class CityEnumType extends AbstractEnumType
{
    public const CITY_KAUNAS = 1;
    public const CITY_VILNIUS = 2;
    public const CITY_KLAIPEDA = 3;
    public const CITY_PANEVEZYS = 4;
    public const CITY_SIAULIAI = 5;
    public const CITY_MARIJAMPOLE = 6;
    public const CITY_TELSIAI = 7;

    public function getTypesAsArray(): array
    {
        return [
            self::CITY_KAUNAS => 'Kaunas',
            self::CITY_VILNIUS => 'Vilnius',
            self::CITY_KLAIPEDA => 'Klaipėda',
            self::CITY_SIAULIAI => 'Šiauliai',
            self::CITY_PANEVEZYS => 'Panevėžys',
            self::CITY_MARIJAMPOLE => 'Marijampolė',
            self::CITY_TELSIAI => 'Telšiai',
        ];
    }
}