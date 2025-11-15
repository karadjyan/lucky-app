<?php

namespace App\Lucky\Services\Calculator;

interface BonusCalculatorInterface
{
    public function calculate(int $number): int;
}
