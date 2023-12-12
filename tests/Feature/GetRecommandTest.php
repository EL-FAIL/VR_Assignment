<?php

namespace Feature;

use App\Http\Data\DietExpertCourceData;
use App\Http\Enums\RecommendSolution;
use App\Http\Services\ArraySearch\ArraySearchService;
use Tests\TestCase;

class GetRecommandTest extends TestCase
{
    public function test_the_right_return_match_value()
    {
        $match = match (ArraySearchService::searchForCountValue(['enough_time'], DietExpertCourceData::getCourse())) {
            "IntermittentFasting" => RecommendSolution::INTERMITTENT_FASTING,
            "LCHF" => RecommendSolution::LCHF,
        };

        $this->assertEquals($match,RecommendSolution::INTERMITTENT_FASTING);
    }
}
