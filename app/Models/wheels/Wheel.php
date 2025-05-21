<?php

namespace App\Models\wheels;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Wheel extends Model
{
    use SoftDeletes;
    use HasFactory;
    public $timestamps = false; // Disable timestamps
    protected $fillable = [
        'name',
        'wheel_type_id',
        'diameter',
        'time',
        'costs',
        'image',
    ];
    public function chassis()
    {
        return $this->belongsToMany(SuitableChassis::class, 'suitable_chassis', 'wheel_id', 'chassis_id');
    }
    public function wheelType()
    {
        return $this->belongsTo(WheelType::class, 'wheel_type_id');
    }
}
