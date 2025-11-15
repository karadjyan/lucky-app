<?php

namespace App\User\Repositories;

use App\Lucky\Dto\DrawResult;

interface UserDrawRepositoryInterface
{
    public function store(int $userId, DrawResult $drawResult): void;

    public function getDrawsByUserId(int $userId, int $limit = 3);
}
