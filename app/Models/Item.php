<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

     // Define the table name (optional if it follows the Laravel convention)
     protected $table = 'items';

     // Define the fillable attributes (fields that can be mass-assigned)
     protected $fillable = [
         'category_id',
         'item_type',
         'item_name',
         'item_description',
         'item_price',
         'item_stock',
         'item_picture',
     ];
 
     // Define the relationships
     // One item belongs to one category
     public function category()
     {
         return $this->belongsTo(Category::class, 'category_id');
     }

     public function orders()
     {
         return $this->belongsToMany(Order::class, 'order_items')
                     ->withPivot('quantity')
                     ->withTimestamps();
     }
 
     // Optional: Define any custom accessors or mutators (e.g., to format price)
 
     // Define a custom accessor to format item price (if needed)
     public function getFormattedPriceAttribute()
     {
         return number_format($this->item_price, 2);
     }
 
     // Define any other custom behavior (such as mutators or scopes)

     public function wishlists()
{
    return $this->hasMany(Wishlist::class, 'item_id');
}
}