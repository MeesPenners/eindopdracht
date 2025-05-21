<?php

namespace App\Models\chassis;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WheelAmount extends Model
{
    use HasFactory;
    public $timestamps = false; // Disable timestamps
    protected $fillable = ['amount'];

    public function chassis()
    {
        return $this->hasMany(Chassis::class, 'wheel_amount_id');
    }
}
