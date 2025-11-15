<?php

namespace App\Dashboard\Actions;

use App\User\Factories\UserLinkFactory;
use App\User\Repositories\UserLinkRepositoryInterface;
use Illuminate\Validation\ValidationException;

final readonly class DeactivateLinkAction
{
    public function __construct(
        private UserLinkRepositoryInterface $userLinkRepository
    ){}

    public function execute(string $token): bool
    {
        return $this->userLinkRepository->deactivateByToken($token);
    }
}
