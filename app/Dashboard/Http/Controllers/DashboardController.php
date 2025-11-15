<?php

namespace App\Dashboard\Http\Controllers;

use App\Dashboard\Actions\DeactivateLinkAction;
use App\Dashboard\Actions\RegenerateLinkAction;

class DashboardController
{
    public function index()
    {
        return view('dashboard');
    }

    public function regenerate(RegenerateLinkAction $action)
    {
        $linkDto = $action->execute(request()->route('token'));

        return response()->redirectToRoute('link', ['token' => $linkDto->token]);
    }

    public function deactivate(DeactivateLinkAction $action)
    {
        return $action->execute(request()->route('token'))
            ? response()->redirectToRoute('index')
            : back()->withErrors(['error' => 'Failed to deactivate link']);
    }
}
