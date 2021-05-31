<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_date',
        'order_status',
        'payment_method',
        'user_id',
    ];

    public function products(){
        return $this->hasMany(Product::class);
    }
}
