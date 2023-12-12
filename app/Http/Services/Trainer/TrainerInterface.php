<?php

namespace App\Http\Services\Trainer;

use App\Http\Enums\RecommendSolution;

interface TrainerInterface
{
    public  function getRecommendSolution(array $lifestyleTags): RecommendSolution;
}
