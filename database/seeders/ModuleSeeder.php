<?php

namespace Database\Seeders;

use App\Models\chassis\Chassis;
use App\Models\drives\Drive;
use App\Models\seats\Seat;
use App\Models\steering_wheels\SteeringWheel;
use App\Models\wheels\Wheel;
use App\Models\wheels\SuitableChassis;
use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $chassis = include database_path('data/DummyModuleData/DummyChassisData.php');
        foreach ($chassis as $chassis) {
            Chassis::create($chassis);
        }
        $drives = include database_path('data/DummyModuleData/DummyDriveData.php');
        foreach ($drives as $drive) {
            Drive::create($drive);
        }
        $seats = include database_path('data/DummyModuleData/DummySeatData.php');
        foreach ($seats as $seat) {
            Seat::create($seat);
        }
        $steeringWheels = include database_path('data/DummyModuleData/DummySteeringWheelData.php');
        foreach ($steeringWheels as $steeringWheel) {
            SteeringWheel::create($steeringWheel);
        }
        $wheels = include database_path('data/DummyModuleData/DummyWheelData.php');
        foreach ($wheels as $wheel) {
            Wheel::create($wheel);
        }
        $suitableChassis = include database_path('data/DummyModuleData/DummySuitableChassisData.php');
        foreach ($suitableChassis as $suitableChassis) {
            SuitableChassis::create($suitableChassis);
        }
    }
}
