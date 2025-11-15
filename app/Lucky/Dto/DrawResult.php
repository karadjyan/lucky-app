<?php

namespace App\Lucky\Dto;

final readonly class DrawResult
{
    public function __construct(
        public string $number,
        public string $isWin,
        public string $bonus,
    ) {}
}
