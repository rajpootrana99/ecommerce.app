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
        'order_type',
        'total',
    ];

    public function getOrderTypeAttribute($attribute){
        return $this->orderTypeOptions()[$attribute] ?? 0;
    }

    public function orderTypeOptions(){
        return [
            1 => 'order confirm',
            0 => 'add to cart',
        ];
    }

    public function getOrderStatusAttribute($attribute){
        return $this->orderStatusOptions()[$attribute] ?? 0;
    }

    public function orderStatusOptions(){
        return [
            2 => 'Rejected',
            1 => 'Confirmed',
            0 => 'Pending',
        ];
    }

    public function products(){
        return $this->belongsToMany(Product::class)->withPivot('qty', 'size', 'color', 'total')->withTimestamps();
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
