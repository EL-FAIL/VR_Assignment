<?php

namespace App\Http\Dtos;

use App\Http\Enums\LifestyleTag;
use App\Http\Enums\RecommendSolution;

class GetMySolutionResponseDto
{
    private RecommendSolution $recommendSolution;

    public final function setRecommendSolution(RecommendSolution $recommendSolution): void
    {
        $this->recommendSolution = $recommendSolution;
    }

    public final function getRecommendSolution(): string
    {
        return $this->recommendSolution->value;
    }

    public function toResponseArray()
    {
        return [
           'recommend_solution' => $this->recommendSolution
        ];
    }
}
