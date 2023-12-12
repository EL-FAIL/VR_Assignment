<?php

namespace App\Http\Services\Trainer;

use App\Http\Enums\RecommendSolution;

interface TrainerInterface
{
    public  function getRecommandSolution(): RecommendSolution;
}
