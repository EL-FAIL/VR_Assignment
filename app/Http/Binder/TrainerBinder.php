<?php

namespace App\Http\Binder;

use App\Http\Dtos\GetMySolutionRequestDto;
use App\Http\Enums\SolutionType;
use App\Http\Services\BMI\FindBmiService;
use App\Http\Services\Trainer\DietExpertService;
use App\Http\Services\Trainer\FitnessCoachClass;
use ReflectionClass;

class TrainerBinder
{

    private FindBmiService $bmiService;
    public function __construct()
    {
        $this->bmiService = new FindBmiService();
    }

    const string DIET_EXPERT_CLASS = DietExpertService::class;
    const string FITNESS_COACH_CLASS = FitnessCoachClass::class;
    public final function bindTrainer(GetMySolutionRequestDto $solutionRequestDto): ReflectionClass
    {
        if($solutionRequestDto->getSolutionType() !== null)
        {
            return $this->bindTrainerForSolutionType($solutionRequestDto->getSolutionType());
        }

        return $this->bindTrainerForSolutionType(
            $this->findSolutionTypeForBmi($solutionRequestDto)
        );
    }

    private function bindTrainerForSolutionType(SolutionType $solutionType) : ReflectionClass
    {
        return match ($solutionType) {
            SolutionType::DIET => new ReflectionClass(self::DIET_EXPERT_CLASS),
            SolutionType::FITNESS => new ReflectionClass(self::FITNESS_COACH_CLASS),
        };
    }

    private function findSolutionTypeForBmi(GetMySolutionRequestDto $solutionRequestDto): SolutionType
    {
        $overBmi = $this->bmiService->findBmi($solutionRequestDto)->isNormalBmi();

        if($overBmi){
            return SolutionType::DIET;
        }

        return SolutionType::FITNESS;
    }
}
