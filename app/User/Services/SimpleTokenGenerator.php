<?php

namespace App\User\Services;

use Random\RandomException;

class SimpleTokenGenerator implements TokenGeneratorInterface
{
    /**
     * @throws RandomException
     */
    public function generate(): string
    {
        return bin2hex(random_bytes(16));
    }
}
