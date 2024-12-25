<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
    use HasFactory;

    // Table name
    protected $table = 'wishlist';

    // Primary Key
    protected $primaryKey = 'wishlist_id';

    // Fillable fields
    protected $fillable = [
        'user_id',
        'item_id',
        'state',
    ];

    /**
     * Relationship with the User model.
     * A wishlist belongs to a user.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relationship with the Item model.
     * A wishlist belongs to an item.
     */
    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
}
