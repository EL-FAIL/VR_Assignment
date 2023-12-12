<?php

namespace App\Http\Services\Trainer;

use App\Http\Data\FitnessCoachData;
use App\Http\Enums\RecommendSolution;
use App\Http\Services\ArraySearch\ArraySearchService;

class FitnessCoachClass implements TrainerInterface
{
    private array $courseData;

    public function __construct()
    {
        $this->courseData = FitnessCoachData::getCourse();
    }

    #[\Override] public final function getRecommendSolution(array $lifestyleTags): RecommendSolution
    {
        return match (ArraySearchService::searchForCountValue($lifestyleTags, $this->courseData)) {
            "Crossfit" => RecommendSolution::CROSSFIT,
            "CardioExercise" => RecommendSolution::CARDIO_EXERSIZE,
            "Strength" => RecommendSolution::STRENGTH,
            "Spinning" => RecommendSolution::SPINNING,
        };
    }
}
