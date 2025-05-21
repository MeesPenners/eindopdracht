<?php

namespace App\Models\chassis;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\wheels\Wheel;


class Chassis extends Model
{
    use SoftDeletes;
    use HasFactory;
    public $timestamps = false; // Disable timestamps
    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'name',
        'wheel_amount_id',
        'vehicle_type_id',
        'length',
        'width',
        'height',
        'time',
        'costs',
        'image',
    ];

    /**
     * Define the relationship with the Wheel model.
     */
    public function wheels()
    {
        return $this->belongsToMany(Wheel::class, 'suitable_chassis', 'chassis_id', 'wheel_id');
    }

    /**
     * Define the relationship with the WheelAmount model.
     */
    public function wheelAmount()
    {
        return $this->belongsTo(WheelAmount::class, 'wheel_amount_id');
    }

    /**
     * Define the relationship with the VehicleType model.
     */
    public function vehicleType()
    {
        return $this->belongsTo(VehicleType::class, 'vehicle_type_id');
    }
}
