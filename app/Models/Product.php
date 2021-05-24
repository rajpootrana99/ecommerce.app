<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'size_id',
        'color_id',
        'category_id',
        'company_id',
        'model_name',
        'description',
        'sale_price',
        'cost_price',
    ];

    public function size(){
        return $this->belongsTo(Size::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function color(){
        return $this->belongsTo(Color::class);
    }

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function productGalleries(){
        return $this->hasMany(ProductGallery::class);
    }
}
