<?php

namespace Feature;

use App\Http\Dtos\GetMySolutionRequestDto;
use App\Http\Services\Bmi\FindBmiService;
use Tests\TestCase;

class BmiCalculationTest extends TestCase
{
    public function test_the_bmi_zero_for_true_return()
    {
        $dto = new GetMySolutionRequestDto();
        $bmiService = new FindBmiService();

        $result = $bmiService->findBmi($dto)->isNormalBmi();

        $this->assertTrue($result);
    }

    public function test_the_bmi_for_weight_over_bmi_false_return()
    {
        $dto = new GetMySolutionRequestDto();
        $bmiService = new FindBmiService();

        $dto->setWeight(80);

        $result = $bmiService->findBmi($dto)->isNormalBmi();

        $this->assertFalse($result);
    }

    public function test_the_bmi_height_over_bmi_false_return()
    {
        $dto = new GetMySolutionRequestDto();
        $bmiService = new FindBmiService();

        $dto->setHeight(150);

        $result = $bmiService->findBmi($dto)->isNormalBmi();

        $this->assertFalse($result);
    }

    public function test_the_bmi_weight_height_right_bmi_true_return()
    {
        $dto = new GetMySolutionRequestDto();
        $bmiService = new FindBmiService();

        $dto->setHeight(150);
        $dto->setWeight(50);

        $result = $bmiService->findBmi($dto)->isNormalBmi();

        $this->assertTrue($result);
    }
}
