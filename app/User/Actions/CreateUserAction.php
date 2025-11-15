<?php

namespace App\User\Actions;

use App\User\Dto\UserDto;
use App\User\Dto\UserLinkDto;
use App\User\Factories\UserLinkFactory;
use App\User\Repositories\UserLinkRepositoryInterface;
use App\User\Repositories\UserRepositoryInterface;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

final readonly class CreateUserAction
{
    public function __construct(
        private UserRepositoryInterface $userRepository,
        private UserLinkRepositoryInterface $userLinkRepository,
        private UserLinkFactory $userLinkFactory
    ){}

    public function execute(UserDto $dto)
    {
        try {
            $user = $this->userRepository->createOrFind($dto);
            $linkDto = $this->userLinkFactory->create($user->id);
            $this->userLinkRepository->create($linkDto);

            return $linkDto;
        } catch (\Throwable $throwable) {
            Log::error($throwable->getMessage());

            throw ValidationException::withMessages([
                'error' => trans('auth.failed'),
            ]);
        }
    }
}
