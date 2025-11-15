<?php

namespace App\User;

use App\User\Repositories\UserLinkRepository;
use App\User\Repositories\UserLinkRepositoryInterface;
use App\User\Repositories\UserRepository;
use App\User\Repositories\UserRepositoryInterface;
use App\User\Services\SimpleTokenGenerator;
use App\User\Services\TokenGeneratorInterface;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(UserLinkRepositoryInterface::class, UserLinkRepository::class);
        $this->app->bind(TokenGeneratorInterface::class, SimpleTokenGenerator::class);
    }
}
