<?php

namespace App\Http\Dtos;

use App\Http\Enums\Gender;
use App\Http\Enums\SolutionType;
use App\Http\Requests\MySolutionRequest;

class GetMySolutionRequestDto
{
    private array $lifestyleTags;
    private ?SolutionType $solutionType = null;
    private ?int $height = null;
    private ?int $weight = null;
    private ?Gender $gender = null;

    public function __construct(MySolutionRequest $mySolutionRequest = null)
    {
        if($mySolutionRequest === null){
            return $this;
        }

        $this->pushRequestValue($mySolutionRequest);
        return $this;
    }

    public final function setLifestyleTag(array $lifestyleTags): void
    {
        $this->lifestyleTags = $lifestyleTags;
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

    public final function getLifeStyleTags(): array
    {
        return $this->lifestyleTags;
    }

    public final function getSolutionType(): SolutionType|null
    {
        return $this->solutionType;
    }

    public final function getHeight(): int|null
    {
        return $this->height;
    }

    public final function getWeight(): int|null
    {
        return $this->weight;
    }

    public final function getGender(): Gender|null
    {
        return $this->gender;
    }

    protected final function pushRequestValue(MySolutionRequest $mySolutionRequest): void
    {
        //필수값
        $this->lifestyleTags = $mySolutionRequest->lifestyle_tag;

        if($mySolutionRequest->exists('solution_type')){
            $this->solutionType = $mySolutionRequest->solution_type;
        }

        if($mySolutionRequest->exists('height')){
            $this->height = $mySolutionRequest->height;
        }

        if($mySolutionRequest->exists('weight')){
            $this->weight = $mySolutionRequest->weight;
        }

        if($mySolutionRequest->exists('gender')){
            $this->gender = $mySolutionRequest->gender;
        }
    }
}
