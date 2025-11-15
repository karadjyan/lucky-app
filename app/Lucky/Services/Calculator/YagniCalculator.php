<?php

namespace App\Lucky\Services\Calculator;

/**
 * @TODO in feature implement strategies
 */
class YagniCalculator implements BonusCalculatorInterface
{
    public function calculate(int $number): int
    {
        if ($number > 900) {
            return $number * 0.7;
        }
        if ($number > 600) {
            return $number * 0.5;
        }
        if ($number > 300) {
            return $number * 0.3;
        }

        return $number * 0.1;
    }
}
