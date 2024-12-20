<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    use HasFactory;

    // Specify the table if it does not follow Laravel's naming conventions
    protected $table = 'order_items';

    // Mass assignable attributes
    protected $fillable = [
        'user_id',
        'order_id',
        'item_id',
        'quantity'
    ];

    /**
     * Define the relationship with the Order model.
     */
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

   

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
