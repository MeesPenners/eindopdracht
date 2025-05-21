<?php

namespace App\Http\Controllers\Dashboards;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PlannerDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('planner.dashboard', compact('user'));
    }
}
