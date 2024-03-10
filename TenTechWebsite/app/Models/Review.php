<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $table = 'reviews';
    protected $fillable = [ // Defines which model attributes can be mass-assigned safely.
        'user_id',
        'prod_id',
        'user_review'
    ];
    public function user() 
    {
        return $this->belongsTo(User::class); // Indicates a "belongs to" relationship with the User model.
    }

    public function rating() 
    {
        return $this->belongsTo(Rating::class, 'user_id', 'user_id');
       
    }

    public function product() 
    {
        return $this->belongsTo(Product::class,'prod_id','id');
    }
    
}
