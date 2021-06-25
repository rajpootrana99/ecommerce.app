<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'address',
        'area',
        'user_id',
        'postal_code',
        'city',
        'province',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    use HasFactory;
}
