<?php

namespace App\Http\Services;

use App\Http\Binder\TrainerBinder;
use App\Http\Dtos\GetMySolutionRequestDto;
use App\Http\Dtos\GetMySolutionResponseDto;

class GetSolutionService
{
    private TrainerBinder $binder;

    public function __construct()
    {
        $this->binder = new TrainerBinder();
    }

    public function getSolution(GetMySolutionRequestDto $solutionRequestDto) : GetMySolutionResponseDto
    {
        $trainer = $this->binder->bindTrainer();

        $trainer->getRecommandSolution($solutionRequestDto->getLifeStyleTags());
    }

}
