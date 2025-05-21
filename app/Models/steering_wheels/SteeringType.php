<?php

namespace App\Models\steering_wheels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SteeringType extends Model
{
    
    use HasFactory;
    public $timestamps = false; // Disable timestamps
    protected $fillable = ['type'];

    public function steering()
    {
        return $this->hasMany(SteeringWheel::class, 'steering_type_id');
    }
}
