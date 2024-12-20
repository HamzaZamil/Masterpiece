<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
    use HasFactory;

    // Specify the table associated with the model
    protected $table = 'wish_list';

    // Specify the primary key if different from 'id'
    protected $primaryKey = 'wishlist_id';

    // Mass assignable attributes
    protected $fillable = ['user_id', 'state'];

    /**
     * Get the user associated with the wishlist.
     *
     * This sets up the inverse of the one-to-many relationship from the User model.
     * Assuming that you have a User model in App\Models with a corresponding foreign key.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function item()
{
    return $this->belongsTo(Item::class, 'item_id');
}
}
