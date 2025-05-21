<?php

namespace App\Models\wheels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WheelType extends Model
{
    use HasFactory;
    public $timestamps = false; // Disable timestamps
    protected $fillable = ['type'];

    public function wheel()
    {
        return $this->hasMany(Wheel::class, 'wheel_type_id');
    }
}
