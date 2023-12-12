<?php

namespace App\Http\Dtos;

use App\Http\Enums\Gender;
use App\Http\Enums\LifestyleTag;
use App\Http\Enums\SolutionType;
use App\Http\Requests\MySolutionRequest;

class GetMySolutionRequestDto
{
    private LifestyleTag $lifestyleTag;
    private SolutionType|null $solutionType;
    private int|null $height;
    private int|null $weight;
    private Gender|null $gender;

    public function __construct(MySolutionRequest $mySolutionRequest = null)
    {
        if($mySolutionRequest === null){
            return $this;
        }

        $this->lifestyleTag = $mySolutionRequest->lifestyleTag;
        $this->solutionType = $mySolutionRequest->solutionType ?? null;
        $this->height = $mySolutionRequest->height ?? null;
        $this->weight = $mySolutionRequest->weight ?? null;
        $this->gender = $mySolutionRequest->gender ?? null;
    }

    public final function setLifestyleTag(LifestyleTag $lifestyleTag): void
    {
        $this->lifestyleTag = $lifestyleTag;
    }

    public final function setSolutionType(SolutionType $solutionType): void
    {
        $this->solutionType = $solutionType;
    }

    public final function setHeight(int $height): void
    {
        $this->height = $height;
    }

    public final function setWeight(int $weight): void
    {
        $this->weight = $weight;
    }

    public final function setGender(Gender $gender): void
    {
        $this->gender = $gender;
    }

    public final function getLifeStyleTag(): string
    {
        return $this->lifestyleTag;
    }

    public final function getSolutionType(): string
    {
        return $this->solutionType;
    }

    public final function getHeight(): int
    {
        return $this->height;
    }

    public final function getWeight(): int
    {
        return $this->weight;
    }

    public final function getGender(): string
    {
        return $this->gender;
    }
}
