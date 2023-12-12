<?php

namespace App\Http\Data;

class BmiData
{
    const MAN_LIMIT_BMI = 22;
    const WOMAN_LIMIT_BMI = 21;
    const MAN_AVG_HEIGHT = 175;
    const MAN_AVG_WEIGHT = 74;
    const WOMAN_AVG_HEIGHT = 158;
    const WOMAN_AVG_WEIGHT = 59;

    public static function getManLimitBmi(): int
    {
        return self::MAN_LIMIT_BMI;
    }

    public static function getWomanLimitBmi(): int
    {
        return self::WOMAN_LIMIT_BMI;
    }

    public static function getManAverageHeight(): int
    {
        return self::MAN_AVG_HEIGHT;
    }

    public static function getWomanAverageHeight(): int
    {
        return self::WOMAN_AVG_HEIGHT;
    }

    public static function getManAverageWeight(): int
    {
        return self::MAN_AVG_WEIGHT;
    }

    public static function getWomanAverageWeight(): int
    {
        return self::WOMAN_AVG_WEIGHT;
    }

}
