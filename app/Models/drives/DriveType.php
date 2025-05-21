<?php

namespace App\Models\drives;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriveType extends Model
{
    use HasFactory;
    public $timestamps = false; // Disable timestamps
    protected $fillable = ['type'];

    /**
     * Define the relationship with the Drive model.
     */
    public function drives()
    {
        return $this->hasMany(Drive::class, 'drive_type_id');
    }
}
