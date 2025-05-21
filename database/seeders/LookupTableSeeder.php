<?php

namespace Database\Seeders;

use App\Models\chassis\VehicleType;
use App\Models\chassis\WheelAmount;
use App\Models\drives\DriveType;
use App\Models\seats\SeatMaterial;
use App\Models\steering_wheels\SteeringType;
use App\Models\wheels\WheelType;
use App\Models\Status;
use App\Models\robots;
use Illuminate\Database\Seeder;

class LookupTableSeeder extends Seeder
{
    public function run(): void
    {
        // Load data from the LookupDataTable file
        $data = include database_path('data/LookupDataTable.php');

        foreach ($data['vehicle_types'] as $type) {
            VehicleType::create(['type' => $type]);
        }

        foreach ($data['wheel_amounts'] as $amount) {
            WheelAmount::create(['amount' => $amount]);
        }

        foreach ($data['drive_types'] as $type) {
            DriveType::create(['type' => $type]);
        }

        foreach ($data['seat_materials'] as $material) {
            SeatMaterial::create(['material' => $material]);
        }

        foreach ($data['steering_types'] as $type) {
            SteeringType::create(['type' => $type]);
        }

        foreach ($data['wheel_types'] as $type) {
            WheelType::create(['type' => $type]);
        }

        foreach ($data['statuses'] as $type) {
            Status::create(['status' => $type]);
        }
        foreach ($data['robots'] as $type) {
            Robots::create(['name' => $type]);
        }
    }
}
