<?php

namespace App\Http\Requests;

use App\Http\Enums\Gender;
use App\Http\Enums\SolutionType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class MySolutionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //인증 인가 없음
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'lifestyle_tag' => 'required|array|max:2|bail',
            'solution_type' => [
                'nullable',
                Rule::enum(SolutionType::class)
            ],
            'height' => 'integer|nullable',
            'weight' => 'integer|nullable',
            'gender' => [
                'nullable',
                Rule::enum(Gender::class)
            ]
        ];
    }

    public function attributes()
    {
        return [
            'lifestyle_tag' => '라이프스타일 태그',
            'solution_type' => '솔루션 타입',
            'height' => '체중',
            'weight' => '신장',
            'gender' => '성별'
        ];
    }
}
