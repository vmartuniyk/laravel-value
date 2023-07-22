<?php

namespace App\Services;

class ServiceA implements FormulaInterface
{
    public static function calculateFormula(int $value_a, int $value_b, int $value_c): int|float
    {
        $second_part = gmp_fact($value_a * $value_c );

        $result = gmp_fact($value_a)
            * gmp_pow( gmp_fact($value_b),$value_c)
            * gmp_sqrt($second_part);

        return round(gmp_strval($result), 1);
    }
}
