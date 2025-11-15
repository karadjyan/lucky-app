<?php

namespace App\User\Http\Controllers;

use App\User\Actions\CreateUserAction;
use App\User\Dto\UserDto;
use App\User\Http\Requests\RegisterRequest;
use Illuminate\Http\RedirectResponse;

class RegisterController
{
    public function index()
    {
        return view('register');
    }

    public function register(RegisterRequest $request, CreateUserAction $action): RedirectResponse
    {
        $linkDto = $action->execute(new UserDto(
            $request->string('name')->value(),
            $request->string('phone')->value(),
        ));

        return response()->redirectToRoute('link', ['token' => $linkDto->token]);
    }
}
