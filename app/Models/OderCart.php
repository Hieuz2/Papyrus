<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OderCart extends Model
{
    use HasFactory;

    protected $fillable = [
        'cart_id',
        'total_amount',
        'email',
        'address',
        'phone',
        'name'
    ];

    public function cart()
    {
        return $this->belongsTo(Cart::class, 'cart_id');
    }
}
