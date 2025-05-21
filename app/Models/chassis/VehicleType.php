<?php

namespace App\Models\chassis;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleType extends Model
{
    use HasFactory;
    public $timestamps = false; // Disable timestamps
    protected $fillable = ['type'];

    public function chassis()
    {
        return $this->hasMany(Chassis::class, 'vehicle_type_id');
    }
}
