<?php

namespace App\User\Repositories;

use App\Lucky\Dto\DrawResult;
use App\User\Models\UserDraw;

class UserDrawRepository implements UserDrawRepositoryInterface
{
    public function store(int $userId, DrawResult $drawResult): void
    {
        UserDraw::query()->create([
            'user_id' => $userId,
            'number' => $drawResult->number,
            'is_win' => $drawResult->isWin,
            'win_amount' => $drawResult->bonus,
        ]);
    }

    public function getDrawsByUserId(int $userId, int $limit = 3): array
    {
        return UserDraw::query()->where('user_id', $userId)->orderByDesc('id')->limit($limit)->get()->toArray();
    }
}
