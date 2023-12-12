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

    public final function getSolution(GetMySolutionRequestDto $solutionRequestDto) : GetMySolutionResponseDto
    {
        $trainer = $this->binder->bindTrainer($solutionRequestDto);

        $recommendSolution =  $trainer->newInstance()->getRecommendSolution($solutionRequestDto->getLifeStyleTags());

        $response = new GetMySolutionResponseDto();
        $response->setRecommendSolution($recommendSolution);

        return $response;
    }

}
