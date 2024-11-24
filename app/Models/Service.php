<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_name',
        'service_description',
        'service_price',
        'service_duration',
    ];

    public function appointments()
{
    return $this->hasMany(Appointment::class, 'service_id');
}
}
