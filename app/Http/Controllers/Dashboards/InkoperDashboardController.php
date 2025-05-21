<?php

namespace App\Http\Controllers\Dashboards;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Models\chassis\Chassis;
use App\Models\chassis\VehicleType;
use App\Models\chassis\WheelAmount;
use App\Models\drives\Drive;
use App\Models\drives\DriveType;
use App\Models\seats\Seat;
use App\Models\seats\SeatMaterial;
use App\Models\steering_wheels\SteeringWheel;
use App\Models\steering_wheels\SteeringType;
use App\Models\wheels\Wheel;
use App\Models\wheels\WheelType;
use App\Models\wheels\SuitableChassis;

class InkoperDashboardController extends Controller
{
    public function __construct()
    {
        $user = Auth::user();
        $chassis = Chassis::withTrashed()->get();
        $wheelAmounts = WheelAmount::all();
        $vehicleTypes = VehicleType::all();
        $drives = Drive::withTrashed()->get();
        $driveTypes = DriveType::all();
        $seats = Seat::withTrashed()->get();
        $materialTypes = SeatMaterial::all();
        $steeringWheels = SteeringWheel::withTrashed()->get();
        $steeringTypes = SteeringType::all();
        $wheels = Wheel::withTrashed()->get();
        $wheelTypes = WheelType::all();
        $suitableChassis = SuitableChassis::withTrashed()->orderBy('wheel_id')->orderBy('chassis_id')->get();
        view()->share('user', $user);
        view()->share('chassis', $chassis);
        view()->share('wheelAmounts', $wheelAmounts);
        view()->share('vehicleTypes', $vehicleTypes);
        view()->share('drives', $drives);
        view()->share('driveTypes', $driveTypes);
        view()->share('seats', $seats);
        view()->share('materialTypes', $materialTypes);
        view()->share('steeringWheels', $steeringWheels);
        view()->share('steeringTypes', $steeringTypes);
        view()->share('wheels', $wheels);
        view()->share('wheelTypes', $wheelTypes);
        view()->share('suitableChassis', $suitableChassis);
    }
    public function index()
    {
        return view('inkoper.dashboard');
    }

    //Chassis table
    public function chassisUpdate(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'wheel_amount_id' => 'required|integer',
            'vehicle_type_id' => 'required|integer',
            'length' => 'required|numeric',
            'width' => 'required|numeric',
            'height' => 'required|numeric',
            'time' => 'required|integer',
            'costs' => 'required|numeric',
            'image' => 'nullable|string',
        ]);
        // Update the chassis record
        $chassis = Chassis::withTrashed()->where('id', $id)->update($validated);

        // return to the view
        $chassis = Chassis::withTrashed()->get();
        return view('inkoper.dashboard', compact('chassis'));
    }

    public function chassisDeleteOrRestore(Request $request, $id)
    {
        $chassis = Chassis::withTrashed()->findOrFail($id); // Retrieve a single model instance by ID
        if ($chassis->trashed()) {
            $chassis->restore(); // Restore the soft-deleted chassis
        } else {
            $chassis->delete(); // Soft-delete the chassis
        }
        // return to the view
        $chassis = Chassis::withTrashed()->get();
        return view('inkoper.dashboard', compact('chassis'));
    }
    public function chassisNew(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'wheel_amount_id' => 'required|integer',
            'vehicle_type_id' => 'required|integer',
            'length' => 'required|numeric',
            'width' => 'required|numeric',
            'height' => 'required|numeric',
            'time' => 'required|integer',
            'costs' => 'required|numeric',
            'image' => 'nullable|string',
        ]);

        Chassis::create($validated);

        $chassis = Chassis::withTrashed()->get();
        return view('inkoper.dashboard', compact('chassis'));
    }




    // Drive table
    public function drivesUpdate(Request $request, $id)
    {
        // dd($request->all());
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'drive_type_id' => 'required|integer',
            'power' => 'required|numeric',
            'time' => 'required|integer',
            'costs' => 'required|numeric',
            'image' => 'nullable|string',
        ]);
        // dd($validated);
        // Update the drive record
        $drive = Drive::withTrashed()->findOrFail($id);
        $drive->update($validated);

        // return to the view
        $drives = Drive::withTrashed()->get();
        return view('inkoper.dashboard', compact('drives'));
    }
    public function drivesDeleteOrRestore(Request $request, $id)
    {
        $drives = Drive::withTrashed()->findOrFail($id); // Retrieve a single model instance by ID
        if ($drives->trashed()) {
            $drives->restore(); // Restore the soft-deleted chassis
        } else {
            $drives->delete(); // Soft-delete the chassis
        }
        // return to the view
        $drives = Drive::withTrashed()->get();
        return view('inkoper.dashboard', compact('drives'));
    }
    public function drivesNew(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'drive_type_id' => 'required|integer',
            'power' => 'required|numeric',
            'time' => 'required|integer',
            'costs' => 'required|numeric',
            'image' => 'nullable|string',
        ]);

        Drive::create($validated);

        $drives = Drive::withTrashed()->get();
        return view('inkoper.dashboard', compact('drives'));
    }




    // Seats table
    public function seatsUpdate(Request $request, $id)
    {
        // dd($request->all());
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'seat_material_id' => 'required|integer',
            'time' => 'required|integer',
            'costs' => 'required|numeric',
            'image' => 'nullable|string',
        ]);
        // dd($validated);
        // Update the seats record
        $seats = Seat::withTrashed()->findOrFail($id);
        $seats->update($validated);

        // return to the view
        $seats = Seat::withTrashed()->get();
        return view('inkoper.dashboard', compact('seats'));
    }
    public function seatsDeleteOrRestore(Request $request, $id)
    {
        $seats = Seat::withTrashed()->findOrFail($id); // Retrieve a single model instance by ID
        if ($seats->trashed()) {
            $seats->restore(); // Restore the soft-deleted chassis
        } else {
            $seats->delete(); // Soft-delete the chassis
        }
        // return to the view
        $seats = Seat::withTrashed()->get();
        return view('inkoper.dashboard', compact('seats'));
    }
    public function seatsNew(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'seat_material_id' => 'required|integer',
            'time' => 'required|integer',
            'costs' => 'required|numeric',
            'image' => 'nullable|string',
        ]);
        Seat::create($validated);

        $seats = Seat::withTrashed()->get();
        return view('inkoper.dashboard', compact('seats'));
    }




    // SteeringWheel table
    public function steeringWheelsUpdate(Request $request, $id)
    {
        // dd($request->all());
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'specialization' => 'nullable|string|max:255',
            'steering_type_id' => 'required|integer',
            'time' => 'required|integer',
            'costs' => 'required|numeric',
            'image' => 'nullable|string',
        ]);
        // dd($validated);
        // Update the steeringWheels record
        $steeringWheels = SteeringWheel::withTrashed()->findOrFail($id);
        $steeringWheels->update($validated);

        // return to the view
        $steeringWheels = SteeringWheel::withTrashed()->get();
        return view('inkoper.dashboard', compact('steeringWheels'));
    }
    public function steeringWheelsDeleteOrRestore(Request $request, $id)
    {
        $steeringWheels = SteeringWheel::withTrashed()->findOrFail($id); // Retrieve a single model instance by ID
        if ($steeringWheels->trashed()) {
            $steeringWheels->restore(); // Restore the soft-deleted chassis
        } else {
            $steeringWheels->delete(); // Soft-delete the chassis
        }
        // return to the view
        $steeringWheels = SteeringWheel::withTrashed()->get();
        return view('inkoper.dashboard', compact('steeringWheels'));
    }
    public function steeringWheelsNew(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'specialization' => 'nullable|string|max:255',
            'steering_type_id' => 'required|integer',
            'time' => 'required|integer',
            'costs' => 'required|numeric',
            'image' => 'nullable|string',
        ]);
        SteeringWheel::create($validated);

        $steeringWheels = SteeringWheel::withTrashed()->get();
        return view('inkoper.dashboard', compact('steeringWheels'));
    }




    // Wheel table
    public function wheelsUpdate(Request $request, $id)
    {
        // dd($request->all());
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'wheel_type_id' => 'required|integer',
            'diameter' => 'required|numeric',
            'time' => 'required|integer',
            'costs' => 'required|numeric',
            'image' => 'nullable|string',
        ]);
        // dd($validated);
        // Update the drive record
        $wheels = Wheel::withTrashed()->findOrFail($id);
        $wheels->update($validated);

        // return to the view
        $wheels = Wheel::withTrashed()->get();
        return view('inkoper.dashboard', compact('wheels'));
    }
    public function wheelsDeleteOrRestore(Request $request, $id)
    {
        $wheels = Wheel::withTrashed()->findOrFail($id); // Retrieve a single model instance by ID
        if ($wheels->trashed()) {
            $wheels->restore(); // Restore the soft-deleted chassis
        } else {
            $wheels->delete(); // Soft-delete the chassis
        }
        // return to the view
        $wheels = Wheel::withTrashed()->get();
        return view('inkoper.dashboard', compact('wheels'));
    }
    public function wheelsNew(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'wheel_type_id' => 'required|integer',
            'diameter' => 'required|numeric',
            'time' => 'required|integer',
            'costs' => 'required|numeric',
            'image' => 'nullable|string',
        ]);

        Wheel::create($validated);

        $wheels = Wheel::withTrashed()->get();
        return view('inkoper.dashboard', compact('wheels'));
    }




    // Suitable chassis table
    public function suitableChassisUpdate(Request $request, $id)
    {
        // dd($request->all());
        $validated = $request->validate([
            'wheel_id' => 'required|integer',
            'chassis_id' => 'required|integer',
        ]);
        // dd($validated);
        // Update the drive record
        $suitableChassis = suitableChassis::withTrashed()->findOrFail($id);
        $suitableChassis->update($validated);

        // return to the view
        $suitableChassis = SuitableChassis::withTrashed()->orderBy('wheel_id')->orderBy('chassis_id')->get();
        return view('inkoper.dashboard', compact('suitableChassis'));
    }
    public function suitableChassisDeleteOrRestore(Request $request, $id)
    {
        $suitableChassis = suitableChassis::withTrashed()->findOrFail($id); // Retrieve a single model instance by ID
        if ($suitableChassis->trashed()) {
            $suitableChassis->restore(); // Restore the soft-deleted chassis
        } else {
            $suitableChassis->delete(); // Soft-delete the chassis
        }
        // return to the view
        $suitableChassis = SuitableChassis::withTrashed()->orderBy('wheel_id')->orderBy('chassis_id')->get();
        return view('inkoper.dashboard', compact('suitableChassis'));
    }
    public function suitableChassisNew(Request $request)
    {
        $validated = $request->validate([
            'wheel_id' => 'required|integer',
            'chassis_id' => 'required|integer',
        ]);
        $exists = SuitableChassis::withTrashed()
            ->where('wheel_id', $validated['wheel_id'])
            ->where('chassis_id', $validated['chassis_id'])
            ->exists();

        if ($exists) {
            return back()->withErrors([
                'duplicate' => 'This wheel and chassis combination already exists.',
            ])->withInput();
        }
        SuitableChassis::create($validated);

        $suitableChassis = SuitableChassis::withTrashed()->orderBy('wheel_id')->orderBy('chassis_id')->get();
        return view('inkoper.dashboard', compact('suitableChassis'));
    }
}
