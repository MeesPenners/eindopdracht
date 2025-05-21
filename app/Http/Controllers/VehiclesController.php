<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class VehiclesController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user->role_id == 2 or $user->role_id == 3) {
            $vehicles = Vehicle::all();
        }
        if ($user->role_id == 1) {
            $vehicles = Vehicle::where('customer_id', $user->id)->get();
        }
        $customers = User::where('role_id', 1)->get();
        return view('vehicles', compact('user', 'vehicles', 'customers'));
    }

    public function show(Request $request, $id)
    {
        $vehicle = Vehicle::findOrFail($id);
        if (Auth::user()->role == 'klant') {
            if (Vehicle::where('id', $id)->where('customer_id', Auth::user()->id)->exists()) {
                return view('vehicle_show', compact('vehicle'));
            } else {
                abort(403, 'Unauthorized action.');
            }
        }
        return view('vehicle_show', compact('vehicle'));
    }
}
