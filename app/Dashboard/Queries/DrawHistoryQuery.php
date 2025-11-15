<?php

namespace App\Dashboard\Queries;

use App\User\Repositories\UserDrawRepositoryInterface;
use App\User\Repositories\UserLinkRepositoryInterface;

final class DrawHistoryQuery
{
    public function __construct(
        private UserLinkRepositoryInterface $userLinkRepository,
        private UserDrawRepositoryInterface $userDrawRepository
    ) {}

    public function fetch(DrawHistoryCriteria $criteria): array
    {
        $userId = $this->userLinkRepository->findUserId($criteria->token);

        return $this->userDrawRepository->getDrawsByUserId($userId, $criteria->limit);
    }
}
