<?php

namespace App\User\Repositories;

use App\User\Dto\UserDto;

interface UserRepositoryInterface
{
    public function createOrFind(UserDto $userDto);
}
