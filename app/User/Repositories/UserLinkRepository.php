<?php

namespace App\User\Repositories;

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

    public function checkActiveByToken(string $token): bool
    {
        return UserLink::query()->where('token', $token)->where('is_active', true)->exists();
    }

    public function findUserId(string $token): int
    {
        return UserLink::query()->where('token', $token)->firstOrFail()->user_id;
    }

    public function deactivateByToken(string $token): bool
    {
        return UserLink::query()->where('token', $token)->update([
            'is_active' => false
        ]);
    }
}
