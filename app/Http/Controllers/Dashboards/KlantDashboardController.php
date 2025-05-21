<?php

namespace App\Http\Controllers\Dashboards;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class KlantDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Add any logic specific to the Klant dashboard
        return redirect()->route('vehicles');
    }
}
