<?php

namespace App\User\Services;

interface TokenGeneratorInterface
{
    public function generate(): string;
}
