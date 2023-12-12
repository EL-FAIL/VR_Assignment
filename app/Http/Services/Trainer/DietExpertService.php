<?php

namespace App\Http\Services\Trainer;

use App\Http\Data\DietExpertCourceData;
use App\Http\Enums\RecommendSolution;
use App\Http\Services\ArraySearch\ArraySearchService;

class DietExpertService implements TrainerInterface
{
    private array $courseData;

    public function __construct()
    {
        $this->courseData = DietExpertCourceData::getCourse();
    }

    #[\Override] public final function getRecommendSolution(array $lifestyleTags): RecommendSolution
    {
        return match (ArraySearchService::searchForCountValue($lifestyleTags, $this->courseData)) {
            "IntermittentFasting" => RecommendSolution::INTERMITTENT_FASTING,
            "LCHF" => RecommendSolution::LCHF,
        };
    }
}
