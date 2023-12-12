## VR_ASSIGNMENT
Laravel : 9.52.16
PHP : 8.3.0

- 변경점
- Request : 유저의 합리적인 운동을 위한 BMI 계산 추가

## API GUIDE

- reques Endpoint -> /solution
- request body
{
    "lifestyle_tag" : array / 최대 값 2개 까지 가능
    "solution_type" : string / 허용값: "DIET","FITNESS" /nullable
    "weight" : integer / nullable
    "height" : integer / nullable
    "gender" : string / 허용값 : "MAN","WOMAN"
}

- response body
{
    "recommend_solution": "Intermittent Fasting"
}

## PR MESSAGE
- database 사용하지 않고 array data를 각각의 class 에 저장하여, search 하여 사용
- require 값을 제외하고 아무 값도 없을 경우 Strength 만 반환
- solution_type 값을 우선하여 검색
- solution_type 이 없을 경우 전문가 클래스는 BMI 계산으로 바인딩, 특정 값 이상 넘을 경우 DIET로 아니라면 FITNESS로 바인딩
- array search 시 lifestyle tag의 항목 값 우선적으로 검색함
-> 예를 들어 lifestyle tag 가 하나만 존재할 경우, tag 가 하나만 묶여있는 값을 우선적으로 검색
