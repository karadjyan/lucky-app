<?php

namespace App\Dashboard\Actions;

use App\Lucky\Dto\DrawResult;
use App\Lucky\Services\LuckyService;
use App\User\Repositories\UserDrawRepositoryInterface;
use App\User\Repositories\UserLinkRepositoryInterface;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

final readonly class LuckyDrawAction
{
    public function __construct(
        private UserLinkRepositoryInterface $userLinkRepository,
        private UserDrawRepositoryInterface $userDrawRepository,
        private LuckyService $luckyService,
    ) {}

    public function execute(string $token): DrawResult
    {
        try {
            $userId = $this->userLinkRepository->findUserId($token);
            $luckyResult = $this->luckyService->draw();
            $this->userDrawRepository->store($userId, $luckyResult);
        } catch (\Throwable $throwable) {
            Log::error($throwable->getMessage());

            throw ValidationException::withMessages([
                'error' => 'Failed to draw',
            ]);
        }

        return $luckyResult;
    }
}
