<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    // set the table name to the cart table
    public $table = 'cart';
    protected $fillable = ['user_id', 'product_id', 'quantity', 'total'];
}
