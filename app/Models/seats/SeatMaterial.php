<?php

namespace App\Models\seats;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeatMaterial extends Model
{
    use HasFactory;
    public $timestamps = false; // Disable timestamps
    protected $fillable = ['material'];

    public function seat()
    {
        return $this->hasMany(Seat::class, 'seat_material_id');
    }
}
