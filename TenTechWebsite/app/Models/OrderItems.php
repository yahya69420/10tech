<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    use HasFactory;
    protected $fillable = ['quantity', 'created_at', 'updated_at', 'order_id', 'product_id'];

    /**
     * Gets all order items from an order
     * 
     * Establishes a one-to-many relationship with OrderItems based on 'order_id'
     */
    public function order()
    {
        return $this->belongsTo(Orders::class, 'order_id');
    }

    /**
     * Gets the product associated with an order item
     * 
     * Establishes a one-to-many relationship with Products based on 'product_id'
     */

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
