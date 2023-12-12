<?php

namespace App\Http\Services\ArraySearch;

class ArraySearchService
{
    public static function searchForCountValue(array $needleArray, array $hayStack): string
    {
        $searchedArray = [];
        $needleCount = count($needleArray);

        //일단 배열 안에 들어있는 값 검색
        foreach ($needleArray as $needle){
            foreach ($hayStack as $key => $array){
                if(in_array($needle,$array)){
                    $searchedArray[] = $key;
                }
            }
        }

        if (count($searchedArray) <= 0) {
            throw new \Exception("검색결과 없음");
        }

        if(count($searchedArray) === 1){
            return $searchedArray[0];
        }

        foreach ($searchedArray as $searchValue) {
            if(count($hayStack[$searchValue]) === $needleCount){
                return $searchValue;
            }
        }

        throw new \Exception("검색결과 없음");
    }
}
