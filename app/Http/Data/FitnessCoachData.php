<?php

namespace App\Http\Data;

class FitnessCoachData
{
    const array FITNESS_COURSE = [
        "Crossfit" => [
            "enough_money",
            "strong_will"
        ],
        "CardioExercise" => [
            "strong_will"
        ],
        "Strength" => [
            "strong_will",
            "enough_time"
        ],
        "Spinning" => [
            "enough_money"
        ]
    ];

    public static function getCourse(): array
    {
        return self::FITNESS_COURSE;
    }
}
