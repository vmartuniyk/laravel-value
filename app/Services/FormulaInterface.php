<?php

namespace App\Services;

interface FormulaInterface
{
    public static function calculateFormula(int $value_a, int $value_b, int $value_c): int|float;
}
