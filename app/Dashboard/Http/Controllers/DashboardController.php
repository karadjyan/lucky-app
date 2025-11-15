<?php

namespace App\Dashboard\Http\Controllers;

use App\Dashboard\Actions\DeactivateLinkAction;
use App\Dashboard\Actions\LuckyDrawAction;
use App\Dashboard\Actions\RegenerateLinkAction;
use App\Dashboard\Queries\DrawHistoryCriteria;
use App\Dashboard\Queries\DrawHistoryQuery;

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

    public function draw(LuckyDrawAction $action)
    {
        $drawResult = $action->execute(request()->route('token'));

        return view('draw', ['result' => $drawResult]);
    }

    public function history(DrawHistoryQuery $query)
    {
        return view('history', [
            'draws' => $query->fetch(new DrawHistoryCriteria(request()->route('token')))
        ]);
    }
}
