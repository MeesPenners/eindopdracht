<?php

namespace App\Models\steering_wheels;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class SteeringWheel extends Model
{
    use SoftDeletes;
    use HasFactory;
    public $timestamps = false; // Disable timestamps
    protected $fillable = [
        'name',
        'specialization',
        'steering_type_id',
        'time',
        'costs',
        'image',
    ];

    /**
     * Define the relationship with the SteeringTypes model.
     */
    public function steeringType()
    {
        return $this->belongsTo(SteeringType::class, 'steering_type_id');
    }
}
