<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Models\chassis\Chassis;
use App\Models\drives\Drive;
use App\Models\seats\Seat;
use App\Models\steering_wheels\SteeringWheel;
use App\Models\wheels\Wheel;

class Vehicle extends Model
{

    protected $fillable = [
        'customer_id',
        'name',
        'chassis_id',
        'drive_id',
        'wheel_id',
        'steering_wheel_id',
        'seat_id',
        'seat_amount',
        'total_cost',
        'total_time',
        'status_id',
        'robot',
    ];

    use HasFactory;
    /**
     * Define the relationship with the module models.
     */
    public function Chassis()
    {
        return $this->belongsTo(Chassis::class, 'chassis_id');
    }
    public function drive()
    {
        return $this->belongsTo(Drive::class, 'drive_id');
    }
    public function seat()
    {
        return $this->belongsTo(Seat::class, 'seat_id');
    }
    public function steering_wheel()
    {
        return $this->belongsTo(SteeringWheel::class, 'steering_wheel_id');
    }
    public function wheel()
    {
        return $this->belongsTo(Wheel::class, 'wheel_id');
    }
    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }
}
