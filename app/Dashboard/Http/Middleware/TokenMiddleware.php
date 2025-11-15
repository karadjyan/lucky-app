<?php

namespace App\Dashboard\Http\Middleware;

use App\User\Repositories\UserLinkRepositoryInterface;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TokenMiddleware
{
    public function __construct(
        private UserLinkRepositoryInterface $userLinkRepository
    ) {}

    public function handle(Request $request, Closure $next)
    {
        abort_unless(
            $this->userLinkRepository->checkActiveByToken($request->route('token')),
            Response::HTTP_NOT_FOUND
        );

        return $next($request);
    }
}
