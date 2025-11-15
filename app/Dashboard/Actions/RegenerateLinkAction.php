<?php

namespace App\Dashboard\Actions;

use App\User\Factories\UserLinkFactory;
use App\User\Repositories\UserLinkRepositoryInterface;
use Illuminate\Validation\ValidationException;

final readonly class RegenerateLinkAction
{
    public function __construct(
        private UserLinkRepositoryInterface $userLinkRepository,
        private UserLinkFactory $userLinkFactory
    ){}

    public function execute(string $token)
    {
        $userId = $this->userLinkRepository->findUserId($token);
        $linkDto = $this->userLinkFactory->create($userId);

        if ($this->userLinkRepository->create($linkDto)) {
            $this->userLinkRepository->deactivateByToken($token);
        } else {
            throw ValidationException::withMessages([
                'error' => 'Failed to regenerate link',
            ]);
        }

        return $linkDto;
    }
}
