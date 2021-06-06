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
        return $this->belongsToMany(Product::class)->withPivot('qty')->withTimestamps();
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
