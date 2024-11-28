<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pets';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'pet_name',
        'pet_type',
        'pet_breed',
        'pet_age',
        'pet_weight',
        'pet_gender',
        'pet_image',
        'pet_medical_history',
    ];

    public function appointments()
{
    return $this->hasMany(Appointment::class, 'pet_id');
}

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'pet_type' => 'string',
        'pet_gender' => 'string',
        'pet_age' => 'integer',
        'pet_weight' => 'integer',
    ];

    /**
     * Get the user that owns the pet.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}   
