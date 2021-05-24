<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use const http\Client\Curl\PROXY_HTTP;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'company_phone',
    ];

    public function products(){
        return $this->hasMany(Product::class);
    }
}
