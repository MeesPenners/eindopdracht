<?php

namespace App\Models\drives;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Drive extends Model
{
    use SoftDeletes;
    use HasFactory;
    public $timestamps = false; // Disable timestamps
    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'name',
        'drive_type_id',
        'power',
        'time',
        'costs',
        'costs',
        'image',
    ];

    /**
     * Define the relationship with the DriveType model.
     */
    public function DriveType()
    {
        return $this->belongsTo(DriveType::class, 'drive_type_id');
    }
}
