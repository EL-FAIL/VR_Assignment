<?php

namespace App\Http\Enums;

enum RecommendSolution: string
{
    case INTERMITTENT_FASTING = "Intermittent Fasting";
    case LCHF = "LCHF";
    case CROSSFIT = "Crossfit";
    case CARDIO_EXERSIZE = "Cardio Exercise";
    case STRENGTH = "Strength";
    case SPINNING = "Spinning";
}
