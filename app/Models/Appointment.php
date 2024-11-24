<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'service_id',
        'pet_id',
        'appointment_date',
        'appointment_time',
        'appointment_location',
        'appointment_status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relationship with the Service model
     */
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    /**
     * Relationship with the Pet model
     */
    public function pet()
    {
        return $this->belongsTo(Pet::class, 'pet_id');
    }
}
