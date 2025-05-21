<?php

namespace App\Http\Controllers\Dashboards;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();

        // Delegate to the appropriate controller based on the user's role
        switch ($user->role->name) {
            case 'klant':
                return app(KlantDashboardController::class)->index();
            case 'monteur':
                return app(MonteurDashboardController::class)->index();
            case 'planner':
                return app(PlannerDashboardController::class)->index();
            case 'inkoper':
                return app(InkoperDashboardController::class)->index();
            default:
                abort(403, 'Unauthorized action.');
        }
    }
}
