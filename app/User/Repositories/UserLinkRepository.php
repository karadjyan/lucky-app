<?php

namespace App\User\Repositories;

use App\User\Dto\UserDto;
use App\User\Dto\UserLinkDto;
use App\User\Models\UserLink;

class UserLinkRepository implements UserLinkRepositoryInterface
{
    public function create(UserLinkDto $linkDto): bool
    {
        return (bool) UserLink::query()->create([
            'user_id' => $linkDto->userId,
            'token' => $linkDto->token,
            'expires_at' => $linkDto->expiresAt,
            'is_active' => $linkDto->isActive,
        ]);
    }
}
