<?php

namespace App\User\Repositories;

use App\User\Dto\UserLinkDto;

interface UserLinkRepositoryInterface
{
    public function create(UserLinkDto $linkDto): bool;
}
