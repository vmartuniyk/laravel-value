<?php

namespace App\Services;

class ServiceB implements FormulaInterface
{
    public static function calculateFormula(int $value_a, int $value_b, int $value_c): int|float
    {
        $sum = sqrt($value_c) * sqrt($value_a);

        $result = pow( $sum * $value_a,$value_a);
        $result = gmp_strval($result);

        return round($result, 1);
    }
}
