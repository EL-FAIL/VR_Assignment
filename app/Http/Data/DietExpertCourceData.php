<?php

namespace App\Http\Data;

use App\Http\Enums\RecommendSolution;

class DietExpertCourceData
{
    const array DIET_EXPERT_COURSE = [
        "IntermittentFasting" => [
            "enough_time",
            "strong_will"
        ],
        "LCHF" => [
            "enough_money"
        ]
    ];

    public static function getCourse(): array
    {
        return self::DIET_EXPERT_COURSE;
    }
}
