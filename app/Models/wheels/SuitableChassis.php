<?php

namespace App\Models\wheels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\chassis\Chassis;
use Illuminate\Database\Eloquent\SoftDeletes;

class SuitableChassis extends Model
{
    use SoftDeletes;
    use HasFactory;
    public $timestamps = false; // Disable timestamps
    protected $fillable = ['wheel_id', 'chassis_id'];

    public function wheel()
    {
        return $this->belongsTo(Wheel::class, 'wheel_id');
    }

    public function chassis()
    {
        return $this->belongsTo(Chassis::class, 'chassis_id');
    }
}
