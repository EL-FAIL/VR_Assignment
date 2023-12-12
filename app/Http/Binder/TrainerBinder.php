<?php

namespace App\Http\Binder;

use App\Http\Dtos\GetMySolutionRequestDto;
use App\Http\Enums\SolutionType;
use App\Http\Services\BMI\FindBmiService;
use App\Http\Services\Trainer\DietExpertService;
use App\Http\Services\Trainer\FitnessCoachClass;

class TrainerBinder
{

    private FindBmiService $bmiService;
    public function __construct()
    {
        $this->bmiService = new FindBmiService();
    }

    const DIET_EXPERT_CLASS = DietExpertService::class;
    const FITNESS_COATCH_CLASS = FitnessCoachClass::class;
    public final function bindTrainer(GetMySolutionRequestDto $solutionRequestDto): \ReflectionClass
    {
        if($solutionRequestDto->getSolutionType() !== null)
        {
            return $this->bindTrainerForSolutionType($solutionRequestDto->getSolutionType());
        }

        return $this->bindTrainerForSolutionType(
            $this->findSolutionTypeForBmi($solutionRequestDto)
        );
    }

    protected final function bindTrainerForSolutionType(SolutionType $solutionType) : \ReflectionClass
    {
        switch ($solutionType){
            case SolutionType::DIET : return new \ReflectionClass(self::DIET_EXPERT_CLASS);
            case SolutionType::FITNESS : return new \ReflectionClass(self::FITNESS_COATCH_CLASS);
        }
    }

    protected final function findSolutionTypeForBmi(GetMySolutionRequestDto $solutionRequestDto): SolutionType
    {
        $overBmi = $this->bmiService->findBmi($solutionRequestDto)->isNormalBmi();

        if($overBmi){
            return SolutionType::DIET;
        }

        return SolutionType::FITNESS;
    }
}
