<?php

namespace App\User\Dto;

class UserDto
{
    public function __construct(
        public string $name,
        public string $phone,
    ) {}
}
