<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'name',
        'price',
        'quantity',
        'category_id',
        'image',
        
    ];
 
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function cart()
{
    return $this->hasMany(Cart::class, 'product_id');
}


}
