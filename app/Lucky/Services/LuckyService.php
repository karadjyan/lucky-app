<?php

namespace App\Lucky\Services;

use App\Lucky\Dto\DrawResult;
use App\Lucky\Services\Calculator\BonusCalculatorInterface;
use Random\RandomException;

final readonly class LuckyService
{
    public function __construct(
        private BonusCalculatorInterface $bonusCalc
    ) {}

    /**
     * @throws RandomException
     */
    public function draw(): DrawResult
    {
        $value = random_int(1, 1000);
        $isWin = $value % 2 === 0;

        return new DrawResult($value, $isWin, $isWin ? $this->bonusCalc->calculate($value) : 0);
    }
}
