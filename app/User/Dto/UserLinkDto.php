<?php

namespace App\User\Dto;

class UserLinkDto
{
    public function __construct(
        public int $userId,
        public string $token,
        public string $expiresAt,
        public bool $isActive,
    ) {}
}
