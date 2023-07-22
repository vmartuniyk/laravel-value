<?php

namespace App\Services;

class ServiceC implements FormulaInterface
{
    public static function calculateFormula(int $value_a, int $value_b, int $value_c): int|float
    {
        $first_part = pow($value_a * $value_c, $value_b);
        $second_part = gmp_fact($value_c * $value_a);
        $result = $first_part / $second_part;
        $result = gmp_strval($result);

        return round($result, 1);
    }
}
