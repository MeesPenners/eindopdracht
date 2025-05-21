<?php

namespace App\Models\seats;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Seat extends Model
{
    use SoftDeletes;
    use HasFactory;
    public $timestamps = false; // Disable timestamps
    protected $fillable = [
        'name',
        'seat_material_id',
        'time',
        'costs',
        'image',
    ];

    /**
     * Define the relationship with the SeatMaterial model.
     */
    public function seatMaterial()
    {
        return $this->belongsTo(SeatMaterial::class, 'seat_material_id');
    }
}
