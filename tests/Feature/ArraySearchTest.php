<?php

namespace Feature;

use App\Http\Data\DietExpertCourceData;
use App\Http\Data\FitnessCoachData;
use App\Http\Services\ArraySearch\ArraySearchService;
use Tests\TestCase;

class ArraySearchTest extends TestCase
{
    public function test_the_array_search_returns_a_right_value()
    {
        $value = ArraySearchService::searchForCountValue(['enough_time'], DietExpertCourceData::getCourse());
        $this->assertEquals($value,"IntermittentFasting");
    }

    public function test_the_array_many_search_retuns_a_right_value()
    {
        $value = ArraySearchService::searchForCountValue(['enough_money','strong_will'], FitnessCoachData::getCourse());
        $this->assertEquals($value,"Crossfit");
    }
}
