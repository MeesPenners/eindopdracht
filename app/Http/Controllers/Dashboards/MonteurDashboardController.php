<?php

namespace App\Http\Controllers\Dashboards;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\chassis\Chassis;
use App\Models\seats\Seat;
use App\Models\drives\Drive;
use App\Models\wheels\Wheel;
use App\Models\chassis\WheelAmount;
use App\Models\User;
use App\Models\steering_wheels\SteeringWheel;
use App\Models\Vehicle;
use App\Models\wheels\SuitableChassis;

class MonteurDashboardController extends Controller
{
    public function __construct()
    {
        $user = Auth::user();
        view()->share('user', $user);
    }

    public function index()
    {
        $user = Auth::user();
        // Fetch data for the Monteur dashboard
        $chassis = Chassis::all();
        $customers = User::where('role_id', 1)->select('id', 'name')->get();

        return view('monteur.dashboard', compact('chassis', 'customers', 'user'));
    }

    public function chassis(Request $request)
    {
        // validate the incoming request
        $validatedData = $request->validate([
            'car_name' => 'required|string|max:255',
            'customer_id' => 'required|exists:users,id|integer',
            'chassis_id' => 'required|exists:chassis,id|integer',
        ]);
        // Convert IDs to integers
        $ChassisId = (int) $validatedData['chassis_id'];
        $CustomerId = (int) $validatedData['customer_id'];
        // Sanitize car_name to prevent malicious input
        $carName = htmlspecialchars($validatedData['car_name'], ENT_QUOTES, 'UTF-8');

        $chassis = Chassis::all();
        $drives = Drive::all();
        $steeringWheels = SteeringWheel::all();
        $seats = Seat::all();
        $selectedChassisId = Chassis::find($ChassisId);
        $selectedCustomerId = User::find($CustomerId);
        $wheels = SuitableChassis::where('chassis_id', $ChassisId)->with('wheel')->get()->pluck('wheel');
        // Return the view with the selected chassis and all chassis data
        return view('monteur.dashboard', compact('chassis', 'drives', 'wheels', 'seats', 'steeringWheels', 'selectedChassisId', 'carName', 'selectedCustomerId',));
    }

    public function store(Request $request)
    {
        $exists = Vehicle::where('customer_id', $request['customer_id'])->where('name', $request['car_name'])->exists();
        if ($exists) {
            return back()->withErrors([
                'duplicate' => 'This car and customer combination already exists.',
            ])->withInput();
        }
        // Validate the incoming request
        $validatedData = $request->validate([
            'car_name' => 'required|string|max:255',
            'customer_id' => 'required|exists:users,id|integer',
            'chassis_id' => 'required|exists:chassis,id|integer',
            'drive_id' => 'required|exists:drives,id|integer',
            'wheel_id' => 'required|exists:wheels,id|integer',
            'steering_wheel_id' => 'required|exists:steering_wheels,id|integer',
            'seat_id' => 'nullable|exists:seats,id|integer',
            'seat_amount' => 'nullable|integer|min:1|max:10',
        ]);


        $wheelAmount_id = Chassis::where('id', $validatedData['chassis_id'])->value('wheel_amount_id');
        $wheelAmount = WheelAmount::where('id', $wheelAmount_id)->value('amount');
        $seatAmount = $validatedData['seat_amount'] ?? 0; // Default to 0 if no seat amount is provided

        $chassisCost = Chassis::where('id', $validatedData['chassis_id'])->value('costs');
        $driveCost = Drive::where('id', $validatedData['drive_id'])->value('costs');
        $wheelCost = Wheel::where('id', $validatedData['wheel_id'])->value('costs');
        $steeringWheelCost = SteeringWheel::where('id', $validatedData['steering_wheel_id'])->value('costs');
        $seatCost = Seat::where('id', $validatedData['seat_id'])->value('costs') ?? 0; // Default to 0 if no seat is selected
        $totalCost = $chassisCost + $driveCost + ($wheelAmount * $wheelCost) + $steeringWheelCost + ($seatCost * $seatAmount);

        $chassisTime = Chassis::where('id', $validatedData['chassis_id'])->value('time');
        $driveTime = Drive::where('id', $validatedData['drive_id'])->value('time');
        $wheelTime = Wheel::where('id', $validatedData['wheel_id'])->value('time');
        $steeringWheelTime = SteeringWheel::where('id', $validatedData['steering_wheel_id'])->value('time');
        $seatTime = Seat::where('id', $validatedData['seat_id'])->value('time') ?? 0; // Default to 0 if no seat is selected
        $seatAmount = $validatedData['seat_amount'] ?? 0; // Default to 0 if no seat amount is provided
        $totalTime = $chassisTime + $driveTime + ($wheelAmount * $wheelTime) + $steeringWheelTime + ($seatTime * $seatAmount);

        if ($wheelAmount == 2) {
            $robot = 'Robot TwoWheels';
        } elseif (Drive::where('id', $validatedData['drive_id'])->value('drive_type_id') == 1) {
            $robot = 'Robot HydroBoy';
        } else {
            $robot = 'Robot HeavyD';
        }

        // add vehicle to the database
        Vehicle::create([
            'customer_id' => $validatedData['customer_id'],
            'name' => htmlspecialchars($validatedData['car_name'], ENT_QUOTES, 'UTF-8'), // Sanitize car_name
            'chassis_id' => $validatedData['chassis_id'],
            'drive_id' => $validatedData['drive_id'],
            'wheel_id' => $validatedData['wheel_id'],
            'steering_wheel_id' => $validatedData['steering_wheel_id'] ?? null,
            'seat_id' => $validatedData['seat_id'] ?? null,
            'seat_amount' => $validatedData['seat_amount'],
            'total_cost' => $totalCost,
            'total_time' => $totalTime,
            'status' => '1',
            'robot_id' => $robot,
        ]);
        $vehicle = Vehicle::where('customer_id', $validatedData['customer_id'])->where('name', $validatedData['car_name'])->first();
        $user = Auth::user();
        return redirect()->route('vehicle.show', ['id' => $vehicle->id]);
    }
}
