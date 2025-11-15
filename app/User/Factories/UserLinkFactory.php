<?php

namespace App\User\Factories;

use App\User\Dto\UserLinkDto;
use App\User\Services\TokenGeneratorInterface;

readonly class UserLinkFactory
{
    public function __construct(
        private TokenGeneratorInterface $tokenGenerator
    ) {}

    public function create(int $userId): UserLinkDto
    {
        return new UserLinkDto(
            $userId,
            $this->tokenGenerator->generate(),
            now()->addDays(config('auth.link_lifetime_days'))->toDateTimeString(),
            true,
        );
    }
}
