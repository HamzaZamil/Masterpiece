<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        
        'category_name',
        'category_description',
        'category_picture'

    ];
    protected $table = 'categories'; // Ensure this matches your table name
    
    protected $primaryKey = 'category_id'; // Specify the primary key

    public function items()
    {
        return $this->hasMany(Item::class, 'category_id');
    }
    
}
