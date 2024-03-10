<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'full_name',
        'address_line_1',
        'address_line_2',
        'city',
        'post_code',
        'country',
        'user_id'
    ];
}
