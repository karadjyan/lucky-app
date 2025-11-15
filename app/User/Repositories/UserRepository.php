<?php

namespace App\User\Repositories;

use App\User\Dto\UserDto;
use App\User\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function createOrFind(UserDto $userDto)
    {
        $user = User::query()->where('phone', $userDto->phone)->first();

        return $user ?? User::query()->create([
            'name' => $userDto->name,
            'phone' => $userDto->phone,
        ]);
    }
}
