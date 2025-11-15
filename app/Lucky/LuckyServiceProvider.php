<?php

namespace App\Lucky;

use App\Lucky\Services\Calculator\BonusCalculatorInterface;
use App\Lucky\Services\Calculator\YagniCalculator;
use Illuminate\Support\ServiceProvider;

class LuckyServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(BonusCalculatorInterface::class, YagniCalculator::class);
    }
}
