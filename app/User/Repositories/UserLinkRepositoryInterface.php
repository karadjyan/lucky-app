<?php

namespace App\User\Repositories;

use App\User\Dto\UserLinkDto;

interface UserLinkRepositoryInterface
{
    public function create(UserLinkDto $linkDto): bool;

    public function checkActiveByToken(string $token): bool;

    public function findUserId(string $token): int;

    public function deactivateByToken(string $token): bool;
}
