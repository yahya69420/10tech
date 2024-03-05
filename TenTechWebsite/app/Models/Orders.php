<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $fillable = ['total_before_discount', 'discount_amount', 'total_after_discount', 'status', 'order_date', 'tracking_number', 'user_address_id', 'user_payment_id', 'discount_id', 'user_id', 'created_at', 'updated_at'];

    /**
    * The Orders model represents a single order in the database.
    *
    * It is used to interact with the orders table, allowing for operations like creating,
    * retrieving, updating, and deleting order records. This model also defines a relationship
    * to the OrderItems model, enabling access to the items associated with an order.
    */
    public function orderItems()
    {
        return $this->hasMany(OrderItems::class, 'order_id');
    }

}
