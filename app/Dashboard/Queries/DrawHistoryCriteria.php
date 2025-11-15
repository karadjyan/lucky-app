<?php

namespace App\Dashboard\Queries;

class DrawHistoryCriteria
{
    public function __construct(
        public string $token,
        public int $limit = 3
    ) {}
}
