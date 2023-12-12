<?php

namespace App\Http\Services\Bmi;

use App\Http\Data\BmiData;
use App\Http\Dtos\GetMySolutionRequestDto;
use App\Http\Enums\Gender;

class FindBmiService
{
    private int $bmi;
    private int $height = BmiData::MAN_AVG_HEIGHT;
    private int $weight = BmiData::MAN_AVG_WEIGHT;
    private Gender $gender = Gender::MAN;

    public final function findBmi(GetMySolutionRequestDto $solutionRequestDto): FindBmiService
    {
        $this->initializeGenderType($solutionRequestDto);

        //아무것도 없을 경우 return 0
        if($solutionRequestDto->getWeight() === null && $solutionRequestDto->getHeight() === null){
            $this->bmi = 0;
            return $this;
        }

        if($solutionRequestDto->getHeight() !== null) {
            $this->height = $solutionRequestDto->getHeight();
        }

        if($solutionRequestDto->getWeight() != null) {
            $this->weight = $solutionRequestDto->getWeight();
        }

        $this->bmi = $this->calculateBmi();

        return $this;
    }

    public final function isNormalBmi(): bool
    {
        if($this->gender === Gender::MAN){
            return BmiData::MAN_LIMIT_BMI > $this->bmi;
        }

        return BmiData::WOMAN_LIMIT_BMI > $this->bmi;
    }

    protected final function initializeGenderType(GetMySolutionRequestDto $solutionRequestDto): void
    {
        if($solutionRequestDto->getGender() !== null && $solutionRequestDto->getGender() === Gender::WOMAN){
            $this->gender = Gender::WOMAN;
            $this->height = BmiData::WOMAN_AVG_HEIGHT;
            $this->weight = BmiData::WOMAN_AVG_WEIGHT;
        }
    }

    protected final function calculateBmi(): int
    {
        return $this->bmi = $this->height / $this->weight;
    }
}
